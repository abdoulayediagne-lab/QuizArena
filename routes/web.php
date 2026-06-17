<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return redirect('/');
})->name('login');

Route::get('/avatar', function () {
    return view('avatar');
})->name('avatar');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/lobby/{room}', function ($room) {
    return view('lobby', ['room' => $room]);
})->name('lobby');

Route::get('/game/{game}', function ($game) {
    return view('game', ['game' => $game]);
})->name('game');

Route::get('/result/{game}', function ($game) {
    return view('result', ['game' => $game]);
})->name('result');

Route::get('/solo', function () {
    return view('solo');
})->name('solo');

Route::get('/solo/{game}', function ($game) {
    return view('solo-game', ['game' => $game]);
})->name('solo-game');

Route::get('/solo-result/{game}', function ($game) {
    return view('solo-result', ['game' => $game]);
})->name('solo-result');

Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

Route::get('/history', function () {
    return view('history');
})->name('history');

require __DIR__.'/auth.php';
