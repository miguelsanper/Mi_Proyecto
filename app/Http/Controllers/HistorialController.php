<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Cotizacion;
use App\Models\historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function mostrarHistoriales(Request $request)
    {
        $searchQuery = $request->input('searchQuery');

        // Incluye la relación 'customer' y ordena las cotizaciones por id de forma descendente
        $cotizaciones = Cotizacion::with('customer')
            ->orderBy('id', 'desc');

        // Verifica si se proporcionó un término de búsqueda
        if ($searchQuery) {
            // Realiza la búsqueda por el nombre del cliente o por ID
            $cotizaciones->whereHas('customer', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', $searchQuery . '%');
            })
            ->orWhere('id', $searchQuery);
        }

        // Pagina los resultados y obtiene las cotizaciones
        $cotizaciones = $cotizaciones->paginate(8);

        // Retorna la vista con la variable $cotizaciones y $searchQuery
        return view('historial', ['cotizaciones' => $cotizaciones, 'searchQuery' => $searchQuery]);
    }

    public function cambiarEstado($id)
    {
        // Recupera la cotización con el ID proporcionado
        $cotizacion = Cotizacion::find($id);

        if ($cotizacion) {
            // Actualiza el estado de la cotización (Aceptado o Rechazado)
            $nuevoEstado = request('estado');

            // Validar que el estado sea 'aceptado' o 'rechazado'
            if ($nuevoEstado && in_array($nuevoEstado, ['aceptado', 'rechazado'])) {
                $cotizacion->status = $nuevoEstado;
                $cotizacion->save();

                // Puedes devolver una respuesta JSON u otra respuesta según sea necesario
                return response()->json(['mensaje' => 'Estado cambiado con éxito']);
            } else {
                return response()->json(['mensaje' => 'Estado no válido'], 400);
            }
        } else {
            // Puedes devolver una respuesta JSON u otra respuesta según sea necesario
            return response()->json(['mensaje' => 'Cotización no encontrada'], 404);
        }
    }
}