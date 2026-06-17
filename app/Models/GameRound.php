<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameRound extends Model
{
    protected $fillable = ['game_id', 'question_id', 'player1_answer_id', 'player2_answer_id', 'player1_time', 'player2_time'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function player1Answer()
    {
        return $this->belongsTo(Answer::class, 'player1_answer_id');
    }

    public function player2Answer()
    {
        return $this->belongsTo(Answer::class, 'player2_answer_id');
    }
}
