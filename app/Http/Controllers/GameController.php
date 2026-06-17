<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameRound;
use App\Models\Question;
use App\Models\Room;
use App\Events\QuestionBroadcasted;
use App\Events\RoundResult;
use App\Events\GameFinished;
use App\Events\GameStarted;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function start(Request $request, Room $room)
    {
        if ($room->status !== 'playing') {
            return response()->json([
                'message' => 'Room is not in playing status',
            ], 400);
        }

        if (Game::where('room_id', $room->id)->exists()) {
            return response()->json([
                'message' => 'Game already started for this room',
            ], 400);
        }

        $category = $room->category ?? 'Aléatoire';

        $difficulty = $room->difficulty ?? 'normal';
        $game = Game::create([
            'room_id' => $room->id,
            'coins_awarded' => 0,
            'category' => $category,
            'difficulty' => $difficulty,
            'is_speed' => $room->is_speed ?? false,
        ]);

        $query = Question::inRandomOrder()->limit(10);
        if ($category !== 'Aléatoire') {
            $query->where('category', $category);
        }
        if ($difficulty !== 'normal') {
            $query->where('difficulty', $difficulty);
        }
        $questions = $query->get();

        foreach ($questions->values() as $index => $question) {
            GameRound::create([
                'game_id' => $game->id,
                'question_id' => $question->id,
                'player1_time' => null,
                'player2_time' => null,
            ]);
        }

        $firstRound = $game->gameRounds()->first()->load('question.answers');
        $roundNumber = 1;

        QuestionBroadcasted::broadcast($game, $firstRound, $roundNumber, $firstRound->question->answers);
        GameStarted::broadcast($game, $room);

        return response()->json([
            'message' => 'Game started',
            'game' => $game,
            'round' => 1,
        ], 201);
    }

    public function answer(Request $request, Game $game)
    {
        $validated = $request->validate([
            'round_number' => ['required', 'integer', 'min:1', 'max:10'],
            'answer_id' => ['nullable', 'exists:answers,id'],
        ]);

        $user = $request->user();
        $room = $game->room;

        $isHost = $room->host_id === $user->id;
        $isGuest = $room->guest_id === $user->id;

        if (!$isHost && !$isGuest) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        $round = $game->gameRounds()
            ->skip($validated['round_number'] - 1)
            ->first();

        if (!$round) {
            return response()->json([
                'message' => 'Round not found',
            ], 404);
        }

        $timeTaken = $request->input('time_taken', 0);

        if ($isHost) {
            if ($round->player1_answer_id !== null || $round->player1_time !== null) {
                return response()->json(['message' => 'You already answered this round'], 400);
            }
            $round->update([
                'player1_answer_id' => $validated['answer_id'] ?? null,
                'player1_time' => $timeTaken,
            ]);
        } else {
            if ($round->player2_answer_id !== null || $round->player2_time !== null) {
                return response()->json(['message' => 'You already answered this round'], 400);
            }
            $round->update([
                'player2_answer_id' => $validated['answer_id'] ?? null,
                'player2_time' => $timeTaken,
            ]);
        }

        $round = $round->load('question', 'player1Answer', 'player2Answer');
        $round->refresh();

        if ($game->is_speed) {

            $justAnswered = $isHost ? $round->player1Answer : $round->player2Answer;
            $justCorrect = $justAnswered && $justAnswered->is_correct;

            if ($justCorrect) {

                if ($isHost && $round->player2_time === null) {
                    $round->update(['player2_time' => -1]);
                } elseif (!$isHost && $round->player1_time === null) {
                    $round->update(['player1_time' => -1]);
                }
                $round->refresh();
                $this->calculateRoundScore($game, $round, $validated['round_number']);
            } elseif ($round->player1_time !== null && $round->player2_time !== null) {

                $this->calculateRoundScore($game, $round, $validated['round_number']);
            }

        } else {
            $bothSubmitted = $round->player1_time !== null && $round->player2_time !== null;
            if ($bothSubmitted) {
                $this->calculateRoundScore($game, $round, $validated['round_number']);
            }
        }

        return response()->json([
            'message' => 'Answer submitted',
            'round' => $round,
        ]);
    }

    private function calculateRoundScore(Game $game, GameRound $round, int $roundNumber)
    {
        $room = $game->room;
        $player1Answer = $round->player1Answer;
        $player2Answer = $round->player2Answer;

        $player1Correct = $player1Answer && $player1Answer->is_correct;
        $player2Correct = $player2Answer && $player2Answer->is_correct;

        RoundResult::broadcast($game, $round, $roundNumber, $player1Correct, $player2Correct);

        $allRounds = $game->gameRounds()->get();
        $nextRound = $allRounds->first(fn($r) => $r->player1_time === null && ($game->is_speed || $r->player2_time === null));

        if (!$nextRound) {
            $this->finishGame($game);
            return;
        }

        $nextRoundNumber = $allRounds->search(fn($r) => $r->id === $nextRound->id) + 1;
        $nextRound->load('question.answers');
        QuestionBroadcasted::broadcast($game, $nextRound, $nextRoundNumber, $nextRound->question->answers);
    }

    private function finishGame(Game $game)
    {
        $rounds = $game->gameRounds()->with('question')->get();
        $player1Score = 0;
        $player2Score = 0;
        $player1Coins = 0;
        $player2Coins = 0;

        $difficultyMultiplier = match($game->difficulty) {
            'facile' => 1,
            'difficile' => 3,
            default => 2,
        };

        foreach ($rounds as $round) {
            if ($round->player1Answer && $round->player1Answer->is_correct) {
                $player1Score++;
                $player1Coins += $difficultyMultiplier;
            }
            if ($round->player2Answer && $round->player2Answer->is_correct) {
                $player2Score++;
                $player2Coins += $difficultyMultiplier;
            }
        }

        $room = $game->room;
        $winner = null;

        if ($player1Score > $player2Score) {
            $winner = $room->host_id;
            $player1Coins += 10;
        } elseif ($player2Score > $player1Score) {
            $winner = $room->guest_id;
            $player2Coins += 10;
        }

        $game->update([
            'winner_id' => $winner,
            'coins_awarded' => max($player1Coins, $player2Coins),
        ]);

        $room->update(['status' => 'finished']);

        GameFinished::broadcast(
            $game,
            $room->host,
            $room->guest,
            $player1Score,
            $player2Score,
            $player1Coins,
            $player2Coins
        );
    }

    public function startSolo(Request $request)
    {
        $validated = $request->validate([
            'category' => ['nullable', 'string'],
            'difficulty' => ['nullable', 'string'],
        ]);

        $user = $request->user();
        $category = $validated['category'] ?? 'Aléatoire';

        $difficulty = in_array($validated['difficulty'] ?? 'normal', ['facile', 'normal', 'difficile']) ? $validated['difficulty'] : 'normal';
        $game = Game::create([
            'room_id' => null,
            'coins_awarded' => 0,
            'category' => $category,
            'difficulty' => $difficulty,
            'is_solo' => true,
        ]);

        $query = Question::inRandomOrder()->limit(10);
        if ($category !== 'Aléatoire') {
            $query->where('category', $category);
        }
        if ($difficulty !== 'normal') {
            $query->where('difficulty', $difficulty);
        }
        $questions = $query->get();

        foreach ($questions->values() as $question) {
            GameRound::create([
                'game_id' => $game->id,
                'question_id' => $question->id,
                'player1_time' => null,
                'player2_time' => 0,
            ]);
        }

        return response()->json(['game' => $game], 201);
    }

    public function answerSolo(Request $request, Game $game)
    {
        $validated = $request->validate([
            'round_number' => ['required', 'integer', 'min:1', 'max:10'],
            'answer_id' => ['nullable', 'exists:answers,id'],
        ]);

        if (!$game->is_solo) {
            return response()->json(['message' => 'Not a solo game'], 400);
        }

        $round = $game->gameRounds()->skip($validated['round_number'] - 1)->first();
        if (!$round) {
            return response()->json(['message' => 'Round not found'], 404);
        }

        if ($round->player1_time !== null) {
            return response()->json(['message' => 'Already answered'], 400);
        }

        $round->update([
            'player1_answer_id' => $validated['answer_id'],
            'player1_time' => $request->input('time_taken', 0),
        ]);

        $round->load('question.answers');
        $correctAnswer = $round->question->answers->firstWhere('is_correct', true);

        return response()->json([
            'correct_answer_id' => $correctAnswer?->id,
            'is_correct' => $validated['answer_id'] && $validated['answer_id'] == $correctAnswer?->id,
        ]);
    }

    public function currentRound(Game $game)
    {
        $rounds = $game->gameRounds()->with('question.answers')->get();
        $isSolo = $game->is_solo;
        $currentRound = $rounds->first(fn($r) => $isSolo
            ? $r->player1_time === null
            : ($r->player1_time === null || ($r->player2_time === null && !$game->is_speed)));

        if (!$currentRound) {
            return response()->json(['message' => 'Game finished'], 404);
        }

        $roundNumber = $rounds->search(fn($r) => $r->id === $currentRound->id) + 1;

        $shuffledAnswers = $currentRound->question->answers->shuffle()->map(fn($a) => [
            'id' => $a->id,
            'content' => $a->content,
        ]);

        return response()->json([
            'round_number' => $roundNumber,
            'question' => [
                'id' => $currentRound->question->id,
                'content' => $currentRound->question->content,
            ],
            'answers' => $shuffledAnswers,
        ]);
    }

    public function show(Request $request, Game $game)
    {
        $game->load('gameRounds.player1Answer', 'gameRounds.player2Answer');

        $score1 = $game->gameRounds->filter(fn($r) => $r->player1Answer && $r->player1Answer->is_correct)->count();
        $score2 = $game->gameRounds->filter(fn($r) => $r->player2Answer && $r->player2Answer->is_correct)->count();

        $extra = ['score1' => $score1, 'score2' => $score2];

        if ($game->is_solo) {
            if ($game->coins_awarded === 0 && $score1 > 0) {
                $user = $request->user();
                if ($user) {
                    $difficultyMultiplier = match($game->difficulty) {
                        'facile' => 1,
                        'difficile' => 3,
                        default => 2,
                    };
                    $coinsEarned = $score1 * $difficultyMultiplier;
                    $user->increment('coins', $coinsEarned);
                    $game->update(['coins_awarded' => $coinsEarned]);
                }
            }
            $extra['coins'] = $game->fresh()->coins_awarded;
        }

        if (!$game->is_solo && $game->room_id) {
            $game->load('room.host.avatarBase', 'room.host.userItems.item', 'room.guest.avatarBase', 'room.guest.userItems.item');
            $extra['coins1'] = $game->room->host_id === $game->winner_id ? 50 : ($score1 === $score2 ? 25 : 10);
            $extra['coins2'] = $game->room->guest_id === $game->winner_id ? 50 : ($score1 === $score2 ? 25 : 10);
            $extra['host'] = $game->room->host;
            $extra['guest'] = $game->room->guest;
        }

        return response()->json(['game' => array_merge($game->toArray(), $extra)]);
    }

    public function history(Request $request)
    {
        $user = $request->user();
        $games = Game::whereHas('room', function ($q) use ($user) {
            $q->where('host_id', $user->id)->orWhere('guest_id', $user->id);
        })->with('room.host.avatarBase', 'room.host.userItems.item', 'room.guest.avatarBase', 'room.guest.userItems.item', 'gameRounds.player1Answer', 'gameRounds.player2Answer')
            ->latest()->get();

        return response()->json([
            'games' => $games->map(fn($game) => [
                'id' => $game->id,
                'host_id' => $game->room->host_id,
                'guest_id' => $game->room->guest_id,
                'host' => $game->room->host,
                'guest' => $game->room->guest,
                'score1' => $game->gameRounds->filter(fn($r) => $r->player1Answer && $r->player1Answer->is_correct)->count(),
                'score2' => $game->gameRounds->filter(fn($r) => $r->player2Answer && $r->player2Answer->is_correct)->count(),
                'coins_awarded' => $game->coins_awarded,
                'winner_id' => $game->winner_id,
            ])->toArray()
        ]);
    }
}
