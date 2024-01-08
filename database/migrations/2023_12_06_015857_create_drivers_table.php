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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            //nombre del conductor:
            $table->string('name');
            //telefono del conductor:
            $table->string('phone');
            //direccion del conductor:
            $table->string('address');
            //llave foranea para asignar trailer:
            //$table->foreignId('trailer_id')->nullable()->constrained('trailers')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
