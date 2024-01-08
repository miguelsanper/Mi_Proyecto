<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarController extends Controller
{
    public function administrarTablas(Request $request)
    {
        return view('administrar');
    }
}
