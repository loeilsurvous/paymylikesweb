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
        Schema::create('publications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('typePub');
            $table->string('contenu_pub');
            $table->dateTime('date_pub')->nullable();
            $table->string('fileName')->nullable();
            $table->foreignUuid('user_id');
            $table->foreignUuid('jackpot_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'jackpot_id'], 'publication_in_jackpot_uniqueness');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
