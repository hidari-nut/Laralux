<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->longText('description');
            $table->longText('address');
            $table->foreignId('citys_id')->constrained('citys')->onDelete('cascade');
            $table->longText('image');
            $table->string('email', 128);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('hotel_types_id')->constrained('hotel_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropForeign(['citys_id']);
            $table->dropForeign(['hotel_types_id']);
        });
        Schema::dropIfExists('hotels');
    }
};
