<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['content', 'category'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function gameRounds()
    {
        return $this->hasMany(GameRound::class);
    }
}
