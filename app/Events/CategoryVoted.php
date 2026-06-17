<?php

namespace App\Events;

use App\Models\Room;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryVoted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Room $room) {}

    public function broadcastOn(): array
    {
        return [new Channel('room.' . $this->room->code)];
    }

    public function broadcastAs(): string
    {
        return 'category-voted';
    }

    public function broadcastWith(): array
    {
        return [
            'host_category' => $this->room->host_category,
            'guest_category' => $this->room->guest_category,
            'final_category' => $this->room->category,
        ];
    }
}
