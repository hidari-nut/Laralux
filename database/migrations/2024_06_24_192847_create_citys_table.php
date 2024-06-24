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
        Schema::create('citys', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('states_id')->constrained('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citys', function (Blueprint $table) {
            $table->dropForeign(['states_id']);
        });
        Schema::dropIfExists('citys');    }
};
