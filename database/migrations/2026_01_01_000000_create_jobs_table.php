<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('queue')->default('default');
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at')->default(0);
            $table->unsignedInteger('created_at');
            $table->longText('exceptions')->nullable();
            $table->unsignedInteger('failed_at')->nullable();
            $table->index(['queue', 'reserved_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
