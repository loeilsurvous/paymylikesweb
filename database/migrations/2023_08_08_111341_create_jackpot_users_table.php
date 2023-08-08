<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jackpot_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('is_admin')->default(false);
            $table->string('image', 255);
            $table->unsignedBigInteger('likes')->default(0);
            $table->foreignUuid('user_id');
            $table->foreignUuid('jackpot_id');
            $table->timestamps();
            $table->unique(['user_id', 'jackpot_id'], 'user_jackpot_uniquness');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jackpot_users');
    }
};
