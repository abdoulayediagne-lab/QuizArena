<?php

namespace App\Jobs;

use App\Models\Game;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AwardCoins implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Game $game,
        public User $player1,
        public User $player2,
        public int $player1Coins,
        public int $player2Coins,
    ) {}

    public function handle(): void
    {
        $this->player1->increment('coins', $this->player1Coins);
        $this->player2->increment('coins', $this->player2Coins);

        $this->player1->transactions()->create([
            'amount' => $this->player1Coins,
            'type' => 'earn',
            'reason' => 'Game reward (Game ID: ' . $this->game->id . ')',
        ]);

        $this->player2->transactions()->create([
            'amount' => $this->player2Coins,
            'type' => 'earn',
            'reason' => 'Game reward (Game ID: ' . $this->game->id . ')',
        ]);
    }
}
