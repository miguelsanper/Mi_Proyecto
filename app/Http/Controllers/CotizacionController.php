<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Distance;
use Psy\Readline\Hoa\Console;

class CotizacionController extends Controller
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
        $cotizacion = new Cotizacion();
        //$user_id = $request->user_id;
        $cotizacion->user_id = 1;
        //$customer_id = $request->customer_id;
        $cotizacion->customer_id = $request->customer_id;
        //fecha de hoy:
        $nombre=Customer::where('id', $request->customer_id)->value('name');
        $cotizacion->date = date('Y-m-d');
        $cotizacion->estimated_date = $request->estimated_date;
        $cotizacion->origin = $request->origin_city;
        $cotizacion->destination = $request->destination_city;

        //en variable $origen concatenar $request->origin_state, $request->origin_city, $request->origin_neighborhood:
        $origen = $request->origin_neighborhood.', '.$request->origin_city . ', '.$request->origin_state;
        //en variable $destino concatenar $request->destination_state, $request->destination_city, $request->destination_neighborhood:
        $destino =  $request->destination_neighborhood. ', ' . $request->destination_city . ', ' .$request->destination_state ;

        $cotizacion->weight = $request->weight;
        $cotizacion->kilometers = $request->kilometers;
        $cotizacion->liters = $request->liter;
        $cotizacion->cost = $request->cost;
        $cotizacion->status = 'pendiente';
        $cotizacion ->save();

        return view('cotizacionCreada', [
            'mensaje' => 'Cotizacion no. 00'.$cotizacion->id.' creada correctamente',
            'ruta' => 'cotizacion.create',
            'pdf' => route('cotizacionpdf.pdf', ['cotizacion' => $cotizacion->id]),
        ],);
    }

    public function verPdf(Request $request)
    {
        $id = $request->id;
        $cotizacion = Cotizacion::find($id);

        $pdf = Pdf::loadView('cotizaciones.pdf', [
            'cotizacion' => $cotizacion,
            'nombre' => $cotizacion->customer->name,
            'origen' => $cotizacion->origin,
            'destino' => $cotizacion->destination,
            // ... otros datos que necesitas en la vista del PDF ...
        ]);

        return $pdf->stream('cotizacion.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacion $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotizacion $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacion $price)
    {
        //
    }

    public function create ()
    {
        $clientes = Customer::all();
        return view ('Cotizaciones.crear_cotizacion', ['clientes' => $clientes]);
    }

    public function verCoti($cotizacion)
    {   //dame todos los datos de la cotizacion del id $request findorfail:
        $cotizacion=Cotizacion::findOrFail($cotizacion);  
        
        //agregar a $cotizacion el nombre del customer de acuerdo al $cotizacion->id_customer:
        $nombre=Customer::where('id', $cotizacion->customer_id)->value('name');
        

        $pdf = Pdf::loadView('cotizaciones.verpdf', compact('cotizacion', 'nombre'));        
        return $pdf->stream('cotizacion.'.$cotizacion->id.'pdf');
    }

    public function obtenerCosto(Request $request)
    {   
        $idd=$request->customer;

        $nombre=Customer::where('id', $idd)->value('name');
        $origin_state = $request->origin_state;
        $origin_city = $request->origin_city;
        $origin_neighborhood = $request->origin_neighborhood;
        $destination_state = $request->destination_state;
        $destination_city = $request->destination_city;
        $destination_neighborhood = $request->destination_neighborhood;
        $peso=$request->weight;

        $comisionOp=2300;

        $fecha = $request->estimated_date;
        
        $kilometers=Distance::where('origen', $origin_city)->where('destino', $destination_city)->value('kms');
        $kilometers=$kilometers*2;
        $litros=round(($kilometers/2.3), 0);

        $precioDiesel= 23.50;

        $casetas=2526;

        $costoTotal=round (($litros*$precioDiesel),2);
        

        $costoTotal=(($costoTotal+$comisionOp+$casetas)*2)*1.2;
        $costoTotal = number_format($costoTotal, 2);


        //retornar el request, los kilómetros, los litros, el precio del diesel y el costo total:
        return view('Cotizaciones.ver_cotizacion',['idd'=>$idd,'nombre'=>$nombre, 'origin_estate' => $origin_state, 
                    'origin_city' => $origin_city, 'origin_neighborhood' => $origin_neighborhood,
                    'destination_estate' => $destination_state, 'destination_city' => $destination_city,
                    'destination_neighborhood' => $destination_neighborhood,'kilometers' => $kilometers, 'litros' => $litros, 
                    'precioDiesel' => $precioDiesel, 'costoTotal' => $costoTotal, 'fecha' => $fecha,
                    'peso' => $peso]);
    }
}