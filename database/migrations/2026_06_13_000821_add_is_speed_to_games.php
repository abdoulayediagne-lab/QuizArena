<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('games', function (Blueprint $table) {
            $table->boolean('is_speed')->default(false)->after('is_solo');
        });
        Schema::table('rooms', function (Blueprint $table) {
            $table->boolean('is_speed')->default(false)->after('guest_category');
        });
    }
    public function down(): void {
        Schema::table('games', fn($t) => $t->dropColumn('is_speed'));
        Schema::table('rooms', fn($t) => $t->dropColumn('is_speed'));
    }
};
