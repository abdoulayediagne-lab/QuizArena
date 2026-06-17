<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['code', 'host_id', 'guest_id', 'status', 'category', 'host_category', 'guest_category', 'is_speed', 'difficulty'];

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function guest()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
