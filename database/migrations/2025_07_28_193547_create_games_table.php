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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('date_time');
            $table->string('location_name');
            $table->decimal('location_latitude', 10, 7);
            $table->decimal('location_longitude', 10, 7);
            $table->string('broadcasted_on')->nullable();
            $table->string('broadcast_link')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['scheduled', 'live', 'finished'])->default('scheduled');
            $table->json('score_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
