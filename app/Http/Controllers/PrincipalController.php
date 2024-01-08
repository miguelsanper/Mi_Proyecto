<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function mostrarPrincipal()
    {
        // Retorna la vista con la variable $historiales
        return view('principal');
    }  
}
