<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Distance>
 */
class DistanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $ciudadOrigen = ['Tampico', 'Altamira'];
        $ciudadDestino = ['Ciudad de México', 'Monterrey', 'Guadalajara', 'Cancún', 'Puebla', 'Mérida', 'Querétaro', 'Toluca', 'Hermosillo', 'Chihuahua', 'Culiacán', 'Acapulco', 'Veracruz', 'Oaxaca', 'Juárez', 'León', 'Mazatlán', 'Puerto Vallarta', 'Cuernavaca', 'victoria'];
        $distancia = ['450', '510', '770', '1800', '450', '1500', '600', '530', '2031', '1330', '1370','818','440','790','1780', '630','1170', '1100','540', '236'];

        $resultado=[];

        //recorrer uno a uno cada arreglo:
        for ($i=0; $i < count($ciudadOrigen); $i++) { 
            for ($j=0; $j < count($ciudadDestino); $j++) { 
                
                    $origen = $ciudadOrigen[$i];
                    $destino = $ciudadDestino[$j];
                    $kms = $distancia[$j];
                    return [
                        //
                        'origen' => $origen,
                        'destino' => $destino,
                        'kms' => $kms,
                    ];
            }
        }
        //return $resultado;
    }
}
