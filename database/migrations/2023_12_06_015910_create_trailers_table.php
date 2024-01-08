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
        Schema::create('trailers', function (Blueprint $table) {
            $table->id();
            //numero economico del remolque:
            $table->string('economic_number');
            //tamaño del remolque:
            $table->string('size');

            //unsignedBigInteger
            $table->unsignedBigInteger('driver_id')->nullable()->unique();
            $table->foreign('driver_id') ->references('id') ->on('drivers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trailers');
    }
};
