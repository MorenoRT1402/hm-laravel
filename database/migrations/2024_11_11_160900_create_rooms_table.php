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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->enum('room_type', config('params.room_types'));
            $table->integer('number');
            $table->string('picture')->nullable();
            $table->enum('bed_type', config('params.bed_types'));
            $table->string('room_floor');
            $table->json('facilities');
            $table->decimal('rate',10, 2);
            $table->decimal('discount',10,2)->nullable();
            $table->enum('status', config('params.room_status'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};