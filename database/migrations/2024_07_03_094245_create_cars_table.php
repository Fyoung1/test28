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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_brands_id');
            $table->unsignedBigInteger('car_models_id');
            $table->integer('year')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('color')->nullable();
            $table->foreign('car_brands_id')->references('id')->on('car_brands')->onDelete('cascade');
            $table->foreign('car_models_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
