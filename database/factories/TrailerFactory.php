<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trailer>
 */
class TrailerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //numero economico:
            'economic_number' => $this->faker->randomNumber(4),
            //tamaño de la caja:
            'size' => $this->faker->randomElement(['20"', '24"', '26"']),
            //llave foranea:
            'driver_id' => $this->faker->unique()->numberBetween(1, 10),

        ];
    }
}
