<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GameController;

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/avatar-bases', function () {
    return response()->json(['data' => \App\Models\AvatarBase::all()]);
});

Route::get('/leaderboard', function () {
    $players = \App\Models\User::with('avatarBase', 'userItems.item')
        ->withCount('gamesWon')
        ->get()
        ->map(fn($u) => [
            'id' => $u->id,
            'name' => $u->name,
            'avatar_base' => $u->avatarBase,
            'avatar_image_path' => $u->avatar_image_path,
            'user_items' => $u->userItems,
            'wins' => $u->games_won_count,
            'losses' => 0
        ])
        ->sortByDesc('wins')
        ->values();
    return response()->json(['players' => $players]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [LogoutController::class, 'store']);

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'show');
        Route::put('/profile', 'update');
    });

    Route::controller(AvatarController::class)->group(function () {
        Route::post('/avatar/upload', 'uploadCustom');
        Route::post('/avatar/select', 'selectBase');
    });

    Route::controller(ShopController::class)->group(function () {
        Route::get('/shop/items', 'index');
        Route::post('/shop/buy/{item}', 'buy');
    });

    Route::controller(RoomController::class)->group(function () {
        Route::post('/rooms', 'create');
        Route::post('/rooms/join', 'join');
        Route::get('/rooms/{room}', function (\App\Models\Room $room) {
            $room->load('host.avatarBase', 'host.userItems.item', 'guest.avatarBase', 'guest.userItems.item', 'games');
            $activeGame = $room->games()->latest()->first();
            $data = $room->toArray();
            $data['active_game_id'] = $activeGame?->id;
            return response()->json(['room' => $data]);
        });
    });

    Route::post('/rooms/{room}/category', [RoomController::class, 'setCategory']);

    Route::controller(GameController::class)->group(function () {
        Route::post('/games/solo', 'startSolo');
        Route::post('/games/start/{room}', 'start');
        Route::post('/games/{game}/answer-solo', 'answerSolo');
        Route::post('/games/{game}/answer', 'answer');
        Route::get('/games/history', 'history');
        Route::get('/games/{game}/current-round', 'currentRound');
        Route::get('/games/{game}', 'show');
    });
});
