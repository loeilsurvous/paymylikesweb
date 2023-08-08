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
        Schema::create('jackpots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('description');
            $table->string('status');
            $table->dateTime('starts_at', 0);
            $table->dateTime('ends_at', 0);
            $table->boolean('is_public')->default(true);
            $table->double('wager', 8, 3);
            $table->double('commission', 5, 3)->default(0.05);
            $table->foreignUuid('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jackpots');
    }
};
