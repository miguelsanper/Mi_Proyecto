<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotizacion>
 */
class CotizacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estado=["pendiente", "aceptado", "rechazado"];
        return [
            //
            //idusuario:
            'user_id' => $this->faker->numberBetween(1, 10),
            //idcliente:
            'customer_id' => $this->faker->numberBetween(1, 10),
            //fecha de cotizacion:
            'date' => $this->faker->date(),
            //fecha estimada de viaje:
            'estimated_date' => $this->faker->date(),
            //origen:
            'origin' => $this->faker->city(),
            //destino:
            'destination' => $this->faker->city(),
            //peso de carga:
            'weight' => $this->faker->numberBetween(1, 100),
            //kilometros:
            'kilometers' => $this->faker->numberBetween(300,1000),
            //litros:
            'liters' => $this->faker->numberBetween(150, 600),
            //costo de viaje:
            'cost' => $this->faker->numberBetween(1, 100),
            //estatus:
            'status' => $estado[rand(0,2)],
        ];
    }
}
