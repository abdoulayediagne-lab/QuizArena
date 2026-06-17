<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            return;
        }

        DB::statement('PRAGMA legacy_alter_table=ON');
        DB::statement('PRAGMA foreign_keys=OFF');

        DB::statement('ALTER TABLE user_items RENAME TO user_items_old');

        DB::statement('CREATE TABLE "user_items" (
            "id" integer primary key autoincrement not null,
            "user_id" integer not null,
            "item_id" integer not null,
            "equipped" tinyint(1) not null default \'0\',
            "created_at" datetime,
            "updated_at" datetime,
            foreign key("user_id") references "users"("id") on delete cascade,
            foreign key("item_id") references "items"("id") on delete cascade
        )');

        DB::statement('INSERT INTO user_items (id, user_id, item_id, equipped, created_at, updated_at)
            SELECT id, user_id, item_id, equipped, created_at, updated_at FROM user_items_old');

        DB::statement('DROP TABLE user_items_old');

        DB::statement('PRAGMA foreign_keys=ON');
        DB::statement('PRAGMA legacy_alter_table=OFF');
    }

    public function down(): void
    {

    }
};
