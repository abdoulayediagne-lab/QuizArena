<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'type', 'image_path', 'price', 'rarity', 'locked', 'unlock_condition'];

    protected $casts = ['locked' => 'boolean'];

    public function userItems()
    {
        return $this->hasMany(UserItem::class);
    }
}
