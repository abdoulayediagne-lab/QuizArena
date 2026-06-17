<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->enum('difficulty', ['facile', 'normal', 'difficile'])->default('normal')->after('category');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->enum('difficulty', ['facile', 'normal', 'difficile'])->default('normal')->after('category');
        });
        Schema::table('games', function (Blueprint $table) {
            $table->enum('difficulty', ['facile', 'normal', 'difficile'])->default('normal')->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('questions', fn($t) => $t->dropColumn('difficulty'));
        Schema::table('rooms', fn($t) => $t->dropColumn('difficulty'));
        Schema::table('games', fn($t) => $t->dropColumn('difficulty'));
    }
};
