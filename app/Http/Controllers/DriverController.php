<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$choferes = Driver::all(); // Obtén los choferes desde la base de datos o como sea necesario
        //return view('ver_choferes', ['choferes' => $choferes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return 'Hola mundo desde store en dirver controller';
        //$driver = Driver::create($request->all());
        $driver = new Driver();
        $driver->name = $request->nombre;
        $driver->phone = $request->telefono;
        $driver->address = $request->direccion;
        $driver->save();
        return view ('mensaje', 
        ['mensaje' => 'Chofer '.$driver->name.' creado con éxito',
        'ruta'=>'drivers.index',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
        return 'Hola mundo desde show en dirver controller';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $driver->name = $request->nombre;
        $driver->phone = $request->telefono;
        $driver->address = $request->direccion;
        $driver->save();

        return view('mensaje', [
            'mensaje' => 'Chofer '. $driver->name.' actualizado correctamente ' ,
            'ruta' => 'drivers.index',
        ],);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
        $driver->delete();
        return view('mensaje', [
            'mensaje' => 'Chofer eliminado correctamente',
            'ruta' => 'drivers.index',
        ],);
    }

    /*public function verChoferes()
    {
        return View('Choferes.ver_choferes', [
            'drivers' => Driver::all(),
            'mensaje' => 'Hola desde el controlador',
        ],);
    }*/

    public function editar(Driver $driver)
    {
        return View('Choferes.editar_chofer', [
            'driver' => $driver,

        ],);
    }
    public function create()
    {
        return View('Choferes.crear_chofer');
    }

    public function verChoferes(Request $request)
    {
        $searchQuery = $request->query('searchQuery', ''); // Obtén el valor del parámetro de búsqueda

        // Aplica la búsqueda a la consulta de los choferes
        if ($searchQuery == ''){
            $drivers = Driver::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('address', 'like', '%' . $searchQuery . '%')
            ->orWhere('phone', 'like', '%' . $searchQuery . '%')
            ->paginate(5);
        }
        else{
            $drivers = Driver::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('address', 'like', '%' . $searchQuery . '%')
            ->orWhere('phone', 'like', '%' . $searchQuery . '%')
            ->orderBy('name', 'asc')
            ->paginate(5);
        }
    
        return view('Choferes.ver_choferes', ['drivers' => $drivers, 'searchQuery' => $searchQuery]);
    }

}
