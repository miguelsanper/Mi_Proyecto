<?php

namespace App\Http\Controllers;

use App\Models\historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function mostrarHistoriales()
    {
        // Obtén todos los historiales paginados (8 por página en este ejemplo)
        $historiales = historial::paginate(8);

        // Retorna la vista con la variable $historiales
        return view('historial', ['historiales' => $historiales]);
    }  
}
