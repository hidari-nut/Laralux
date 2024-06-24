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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bookings_id')->constrained('bookings')->onDelete('cascade');
            $table->foreignId('rooms_id')->constrained('rooms')->onDelete('cascade');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->integer('adult');
            $table->integer('children')->nullable();
            $table->integer('qty');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking_details', function (Blueprint $table) {
            $table->dropForeign(['bookings_id']);
            $table->dropForeign(['rooms_id']);
        });
        Schema::dropIfExists('booking_details');
     }
};
