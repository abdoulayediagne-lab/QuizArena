<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('category')->default('Aléatoire')->after('coins_awarded');
            $table->boolean('is_solo')->default(false)->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['category', 'is_solo']);
        });
    }
};
