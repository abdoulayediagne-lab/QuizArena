<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['room_id', 'winner_id', 'coins_awarded', 'category', 'is_solo', 'is_speed', 'difficulty'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function gameRounds()
    {
        return $this->hasMany(GameRound::class);
    }
}
