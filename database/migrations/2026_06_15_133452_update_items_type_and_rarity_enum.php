<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {

        DB::statement('PRAGMA legacy_alter_table=ON');
        DB::statement('PRAGMA foreign_keys=OFF');

        DB::statement('ALTER TABLE items RENAME TO items_old');

        DB::statement('CREATE TABLE items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR NOT NULL,
            type VARCHAR CHECK(type IN (\'hat\',\'glasses\',\'effect\',\'avatar\')) NOT NULL,
            image_path VARCHAR NOT NULL,
            price INTEGER NOT NULL,
            rarity VARCHAR CHECK(rarity IN (\'common\',\'rare\',\'epic\',\'legendary\')) NOT NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        )');

        DB::statement('INSERT INTO items SELECT * FROM items_old');
        DB::statement('DROP TABLE items_old');

        DB::statement('PRAGMA foreign_keys=ON');
        DB::statement('PRAGMA legacy_alter_table=OFF');
    }

    public function down(): void
    {
        DB::statement('PRAGMA legacy_alter_table=ON');
        DB::statement('PRAGMA foreign_keys=OFF');

        DB::statement('ALTER TABLE items RENAME TO items_old');

        DB::statement('CREATE TABLE items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR NOT NULL,
            type VARCHAR CHECK(type IN (\'hat\',\'glasses\',\'effect\')) NOT NULL,
            image_path VARCHAR NOT NULL,
            price INTEGER NOT NULL,
            rarity VARCHAR CHECK(rarity IN (\'common\',\'rare\',\'epic\')) NOT NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL
        )');

        DB::statement('INSERT INTO items SELECT * FROM items_old');
        DB::statement('DROP TABLE items_old');

        DB::statement('PRAGMA foreign_keys=ON');
        DB::statement('PRAGMA legacy_alter_table=OFF');
    }
};
