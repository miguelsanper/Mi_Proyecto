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
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            //idusuario:
            $table->unsignedBigInteger('user_id');
            //idcliente:
            $table->unsignedBigInteger('customer_id');
            //fecha de cotizacion:
            $table->date('date');
            //fecha estimada de viaje:
            $table->date('estimated_date');
            //origen:
            $table->string('origin');
            //destino:
            $table->string('destination');
            //peso de carga:
            $table->string('weight');
            //kilometros:
            $table->string('kilometers');
            //litros:
            $table->string('liters');
            //costo de viaje:
            $table->string('cost');
            //estatus:
            $table->string('status'); //pendiente, aceptado, rechazado
            
            $table->foreign('customer_id') ->references('id') ->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
