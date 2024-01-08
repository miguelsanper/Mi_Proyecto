<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $customer = new Customer();
        $customer->name = $request->nombre;
        $customer->rfc = $request->rfc;
        $customer->address = $request->direccion;
        $customer->phone = $request->telefono;
        $customer->email = $request->correo;
        $customer->save();
        return view ('mensaje', 
        ['mensaje' => 'Cliente '.$customer->name.' creado con éxito',
        'ruta'=>'customers.index',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customer->name = $request->nombre;
        $customer->rfc = $request->rfc;
        $customer->address = $request->direccion;
        $customer->phone = $request->telefono;
        $customer->email = $request->correo;
        $customer->save();
        return view ('mensaje', 
        ['mensaje' => 'Cliente '.$customer->name.' actualizado con éxito',
        'ruta'=>'customers.index',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return view ('mensaje', 
        ['mensaje' => 'Cliente eliminado con éxito',
        'ruta'=>'customers.index',
        ]);

    }

    /*public function verclientes()
    {
        return View ('Clientes.ver_clientes', 
        ['customers' => Customer::all(),
    ],);
    }*/

    public function editar(Customer $customer)
    {
        return View ('Clientes.editar_cliente', 
        ['customer' => $customer,
    ],);
    }

    public function create()
    {
        return View ('Clientes.crear_cliente');
    }   

    public function verclientes(Request $request)
    {
        $searchQuery = $request->input('searchQuery', ''); // Obtener el término de búsqueda de la solicitud
        
        $customers = Customer::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('rfc', 'like', '%' . $searchQuery . '%')
            ->orWhere('address', 'like', '%' . $searchQuery . '%')
            ->orWhere('phone', 'like', '%' . $searchQuery . '%')
            ->orWhere('email', 'like', '%' . $searchQuery . '%')
            #->orderBy('name') // Ordenar alfabéticamente por el campo 'name'
            ->paginate(5);

        return view('Clientes.ver_clientes', ['customers' => $customers, 'searchQuery' => $searchQuery]);
    }
}