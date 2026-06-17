<?php

namespace App\Events;

use App\Models\Game;
use App\Models\GameRound;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RoundResult implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Game $game,
        public GameRound $round,
        public int $roundNumber,
        public bool $player1Correct,
        public bool $player2Correct,
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('game.' . $this->game->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'round-result';
    }

    public function broadcastWith(): array
    {
        $rounds = $this->game->gameRounds()->get();
        $player1Score = 0;
        $player2Score = 0;

        foreach ($rounds as $r) {
            if ($r->player1Answer && $r->player1Answer->is_correct) {
                $player1Score++;
            }
            if ($r->player2Answer && $r->player2Answer->is_correct) {
                $player2Score++;
            }
        }

        $this->round->loadMissing('question.answers');
        $correctAnswer = $this->round->question->answers->firstWhere('is_correct', true);

        return [
            'round_number' => $this->roundNumber,
            'player1_correct' => $this->player1Correct,
            'player2_correct' => $this->player2Correct,
            'player1_score' => $player1Score,
            'player2_score' => $player2Score,
            'correct_answer_id' => $correctAnswer?->id,
            'player1_answer_id' => $this->round->player1_answer_id,
            'player2_answer_id' => $this->round->player2_answer_id,
        ];
    }
}
