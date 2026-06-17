<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('category')->default('Aléatoire')->after('status');
            $table->string('host_category')->nullable()->after('category');
            $table->string('guest_category')->nullable()->after('host_category');
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['category', 'host_category', 'guest_category']);
        });
    }
};
