<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'Chien',
                'type' => 'avatar',
                'image_path' => 'items/chien.jpeg',
                'price' => 50,
                'rarity' => 'common',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Loup',
                'type' => 'avatar',
                'image_path' => 'items/loup.png',
                'price' => 200,
                'rarity' => 'rare',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Léopard',
                'type' => 'avatar',
                'image_path' => 'items/leopard.jpeg',
                'price' => 50,
                'rarity' => 'common',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Panthère',
                'type' => 'avatar',
                'image_path' => 'items/panthere.jpg',
                'price' => 200,
                'rarity' => 'rare',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Lion',
                'type' => 'avatar',
                'image_path' => 'items/lion.webp',
                'price' => 600,
                'rarity' => 'epic',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Dragon',
                'type' => 'avatar',
                'image_path' => 'items/dragon.webp',
                'price' => 600,
                'rarity' => 'epic',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Cerbère',
                'type' => 'avatar',
                'image_path' => 'items/cerberus.png',
                'price' => 900,
                'rarity' => 'legendary',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Phénix',
                'type' => 'avatar',
                'image_path' => 'items/phoenix.png',
                'price' => 900,
                'rarity' => 'legendary',
                'locked' => false,
                'unlock_condition' => null,
            ],
            [
                'name' => 'Aigle Doré',
                'type' => 'avatar',
                'image_path' => 'items/aigle-dore.jpeg',
                'price' => 0,
                'rarity' => 'legendary',
                'locked' => true,
                'unlock_condition' => 'all_items + 40/50 Laravel',
            ],
            [
                'name' => 'Serpent Doré',
                'type' => 'avatar',
                'image_path' => 'items/serpent-dore.jpeg',
                'price' => 0,
                'rarity' => 'legendary',
                'locked' => true,
                'unlock_condition' => 'all_items + 40/50 IA',
            ],
        ];

        foreach ($items as $item) {
            Item::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
