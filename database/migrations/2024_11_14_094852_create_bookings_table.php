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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('guest');
            $table->string('picture')->nullable();
            $table->date('order_date');
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('discount', 5, 2);
            $table->text('notes')->nullable();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->enum('status', config('params.booking_status'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
