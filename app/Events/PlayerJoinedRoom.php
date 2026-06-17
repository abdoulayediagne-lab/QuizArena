<?php

namespace App\Events;

use App\Models\Room;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerJoinedRoom implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Room $room,
        public User $guest,
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('room.' . $this->room->code),
        ];
    }

    public function broadcastAs(): string
    {
        return 'player-joined';
    }

    public function broadcastWith(): array
    {
        return [
            'guest' => [
                'id' => $this->guest->id,
                'name' => $this->guest->name,
                'avatar_base_id' => $this->guest->avatar_base_id,
                'avatar_base' => $this->guest->avatarBase,
                'equipped_items' => $this->guest->userItems()->where('equipped', true)->with('item')->get(),
            ],
        ];
    }
}
