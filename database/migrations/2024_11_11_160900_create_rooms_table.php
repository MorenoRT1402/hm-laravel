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
            $table->enum('room_type',['Normal','Deluxe A', 'Deluxe B', 'Deluxe C ', 'Duplex','Suite']);
            $table->integer('number');
            $table->string('picture');
            $table->enum('bed_type',['Single bed','Double bed','Double Superior','Suite']);
            $table->enum('room_floor',['A1','A2','A3','B1','B2','B3']);
            $table->json('facilities');
            $table->decimal('rate',10, 2);
            $table->decimal('discount',10,2);
            $table->enum('status',['Available','Booked']);
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