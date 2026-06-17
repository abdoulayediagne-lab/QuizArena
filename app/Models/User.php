<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'email', 'password', 'coins', 'avatar_base_id', 'avatar_image_path'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{

    use HasFactory, HasApiTokens, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function avatarBase()
    {
        return $this->belongsTo(AvatarBase::class);
    }

    public function userItems()
    {
        return $this->hasMany(UserItem::class);
    }

    public function hostedRooms()
    {
        return $this->hasMany(Room::class, 'host_id');
    }

    public function guestRooms()
    {
        return $this->hasMany(Room::class, 'guest_id');
    }

    public function gamesWon()
    {
        return $this->hasMany(Game::class, 'winner_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
