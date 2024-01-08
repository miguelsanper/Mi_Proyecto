<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use Illuminate\Http\Request;
use App\Models\Driver;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $trailer = new Trailer();
        $trailer->economic_number = $request->economico;
        $trailer->size = $request->size;
        $trailer->driver_id=$request->chofer;
        $trailer->save();
        
        return view('mensaje', [
            'mensaje' => 'Trailer ' . $trailer->economic_number . ' creado con éxito',
            'ruta' => 'trailers.index',
            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trailer $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trailer $trailer)
    {
        //
        $trailer->economic_number = $request->economico;
        $trailer->size = $request->tamaño;
        $trailer->driver_id = $request->chofer_no_asignado;
        $trailer->save();

        return view('mensaje', [
            'mensaje' => 'Trailer '. $trailer->economic_number.' actualizado correctamente ' ,
            'ruta' => 'trailers.index',
        ],);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trailer $trailer)
    {
        //
        $trailer->delete();
        return view('mensaje', [
            'mensaje' => 'Trailer eliminado correctamente ' ,
            'ruta' => 'trailers.index',
        ],);
    }

    public function verTrailers(Request $request)
    {
        $searchQuery = $request->input('searchQuery', '');
        
        $trailers = Trailer::where('economic_number', 'like', "%$searchQuery%")
            ->orWhere('size', 'like', "%$searchQuery%")
            ->with('driver')
            ->paginate(4);
            
        
            
    return View('Trailers.ver_trailers', ['trailers' => $trailers,'searchQuery' => $searchQuery,]);
    }

    public function editar(Trailer $trailer)
    {
        // Obtener todos los choferes que no están en la tabla trailers
        $choferesNoAsignados = Driver::doesntHave('trailers')->get();
    
        // Cargar la relación driver en el trailer
        $trailer->load('driver');
    
        return view('Trailers.editar_trailers', [
            'trailer' => $trailer,
            'choferesNoAsignados' => $choferesNoAsignados,
        ]);
    }

    public function create()
    {

        //$choferes = Driver::all();
        //$choferes = Driver::whereNull('trailer_id')->get();
        //obtener los choferes que no se encuentren en la tabla trailers:
        $choferes = Driver::doesntHave('trailers')->get();
        

        return View ('Trailers.crear_trailers', ['choferes' => $choferes,]);
    }
}
