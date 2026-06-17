<?php

namespace App\Events;

use App\Models\Game;
use App\Models\User;
use App\Jobs\AwardCoins;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GameFinished implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Game $game,
        public User $player1,
        public User $player2,
        public int $player1Score,
        public int $player2Score,
        public int $player1Coins,
        public int $player2Coins,
    ) {
        AwardCoins::dispatch($this->game, $this->player1, $this->player2, $this->player1Coins, $this->player2Coins);
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('game.' . $this->game->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'game-finished';
    }

    public function broadcastWith(): array
    {
        $winner = null;
        if ($this->player1Score > $this->player2Score) {
            $winner = $this->player1->id;
        } elseif ($this->player2Score > $this->player1Score) {
            $winner = $this->player2->id;
        }

        return [
            'winner_id' => $winner,
            'player1' => [
                'id' => $this->player1->id,
                'name' => $this->player1->name,
                'score' => $this->player1Score,
                'coins_awarded' => $this->player1Coins,
            ],
            'player2' => [
                'id' => $this->player2->id,
                'name' => $this->player2->name,
                'score' => $this->player2Score,
                'coins_awarded' => $this->player2Coins,
            ],
        ];
    }
}
