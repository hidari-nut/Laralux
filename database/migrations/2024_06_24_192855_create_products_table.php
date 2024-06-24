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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->tinyInteger('category');
            $table->integer('qty')->nullable();
            $table->longText('icon')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('rooms_id')->constrained('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['rooms_id']);
        });
        Schema::dropIfExists('products');
    }
};
