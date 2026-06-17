<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('avatar_base_id')->nullable()->constrained('avatar_bases')->nullOnDelete();
            $table->string('avatar_image_path')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor('avatar_bases');
            $table->dropColumn('avatar_base_id');
            $table->dropColumn('avatar_image_path');
        });
    }
};
