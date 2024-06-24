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
            $table->string('name', 45);
            $table->double('price');
            $table->integer('capacity');
            $table->longText('description');
            $table->longText('image');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('room_types_id')->constrained('room_types')->onDelete('cascade');
            $table->foreignId('hotels_id')->constrained('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['room_types_id']);
            $table->dropForeign(['hotels_id']);
        });
        Schema::dropIfExists('rooms');
    }
};
