<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorialesTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Arrays de nombres y apellidos
        $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Carlos', 'Laura', 'Roberto', 'Sofía', 'Luis', 'Elena'];
        $apellidos = ['García', 'Martínez', 'López', 'Rodríguez', 'Pérez', 'Gómez', 'Fernández', 'Díaz', 'Hernández', 'Moreno'];

        // Generar 50 registros de prueba
        for ($i = 1; $i <= 50; $i++) {
            $nombreAleatorio = $nombres[array_rand($nombres)];
            $apellidoAleatorio = $apellidos[array_rand($apellidos)];

            DB::table('historiales')->insert([
                'nombre' => $nombreAleatorio . ' ' . $apellidoAleatorio,
                'fecha' => now(),
                'origen' => 'Origen de prueba ' . $i,
                'destino' => 'Destino de prueba ' . $i,
                'costo' => rand(10, 100), // Costo aleatorio entre 10 y 100
                // Agrega otras columnas según tus necesidades
            ]);
        }
    }
}