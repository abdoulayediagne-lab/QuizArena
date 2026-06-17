<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvatarBase extends Model
{
    protected $fillable = ['name', 'image_path', 'is_class_character'];
}
