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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            //nombre del cliente:
            $table->string('name');
            //rfc del cliente:
            $table->string('rfc');          
            //direccion del cliente:
            $table->string('address');
            //telefono del cliente:
            $table->string('phone');
            //email del cliente:
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
