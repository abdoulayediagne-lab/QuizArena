<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Events\PlayerJoinedRoom;
use App\Events\RoomReady;
use App\Events\CategoryVoted;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function create(Request $request)
    {
        $user = $request->user();

        $code = $this->generateUniqueCode();

        $isSpeed = $request->boolean('is_speed', false);
        $difficulty = in_array($request->input('difficulty'), ['facile', 'normal', 'difficile']) ? $request->input('difficulty') : 'normal';

        $room = Room::create([
            'code' => $code,
            'host_id' => $user->id,
            'status' => 'waiting',
            'is_speed' => $isSpeed,
            'difficulty' => $difficulty,
        ]);

        return response()->json([
            'message' => 'Room created successfully',
            'room' => $room->load('host'),
        ], 201);
    }

    public function join(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'exists:rooms,code'],
        ]);

        $room = Room::where('code', $validated['code'])->firstOrFail();

        if ($room->status !== 'waiting') {
            return response()->json([
                'message' => 'Room is not available',
            ], 400);
        }

        $user = $request->user();

        if ($room->host_id === $user->id) {
            return response()->json([
                'message' => 'You are the host of this room',
            ], 400);
        }

        $room->update([
            'guest_id' => $user->id,
            'status' => 'playing',
        ]);

        $room = $room->load('host', 'guest');

        PlayerJoinedRoom::broadcast($room, $user);
        RoomReady::broadcast($room);

        return response()->json([
            'message' => 'Joined room successfully',
            'room' => $room,
        ]);
    }

    public function setCategory(Request $request, Room $room)
    {
        $validated = $request->validate([
            'category' => ['required', 'string'],
        ]);

        $user = $request->user();
        $category = $validated['category'];

        if ($room->host_id === $user->id) {
            $room->update(['host_category' => $category]);
        } elseif ($room->guest_id === $user->id) {
            $room->update(['guest_category' => $category]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $room->refresh();

        if ($room->host_category && $room->guest_category) {
            $finalCategory = $room->host_category === $room->guest_category
                ? $room->host_category
                : 'Aléatoire';
            $room->update(['category' => $finalCategory]);
        }

        CategoryVoted::broadcast($room);

        return response()->json(['room' => $room]);
    }

    private function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Room::where('code', $code)->exists());

        return $code;
    }
}

