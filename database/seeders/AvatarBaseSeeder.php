<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AvatarBase;

class AvatarBaseSeeder extends Seeder
{
    public function run(): void
    {
        $avatars = [
            [
                'name' => 'Chat',
                'image_path' => 'avatars/cat.jpeg',
                'is_class_character' => false,
            ],
            [
                'name' => 'Chouette',
                'image_path' => 'avatars/owl.jpeg',
                'is_class_character' => false,
            ],
            [
                'name' => 'Pingouin',
                'image_path' => 'avatars/penguin.jpeg',
                'is_class_character' => false,
            ],
            [
                'name' => 'Renard',
                'image_path' => 'avatars/fox.png',
                'is_class_character' => false,
            ],
            [
                'name' => 'Panda',
                'image_path' => 'avatars/panda.jpeg',
                'is_class_character' => false,
            ],
        ];

        foreach ($avatars as $avatar) {
            AvatarBase::updateOrCreate(
                ['image_path' => $avatar['image_path']],
                $avatar
            );
        }
    }
}
