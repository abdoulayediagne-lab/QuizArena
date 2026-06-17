<?php

namespace App\Events;

use App\Models\Game;
use App\Models\GameRound;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class QuestionBroadcasted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Game $game,
        public GameRound $round,
        public int $roundNumber,
        public Collection $answers,
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('game.' . $this->game->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'question-broadcasted';
    }

    public function broadcastWith(): array
    {
        $shuffledAnswers = $this->answers->shuffle()->map(function ($answer) {
            return [
                'id' => $answer->id,
                'content' => $answer->content,
            ];
        });

        return [
            'round_number' => $this->roundNumber,
            'question' => [
                'id' => $this->round->question->id,
                'content' => $this->round->question->content,
            ],
            'answers' => $shuffledAnswers,
        ];
    }
}
