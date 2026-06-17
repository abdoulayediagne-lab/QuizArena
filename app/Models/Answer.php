<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'content', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function gameRoundsAsPlayer1()
    {
        return $this->hasMany(GameRound::class, 'player1_answer_id');
    }

    public function gameRoundsAsPlayer2()
    {
        return $this->hasMany(GameRound::class, 'player2_answer_id');
    }
}
