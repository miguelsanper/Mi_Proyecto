@extends('administrar')

@section('content2')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Clientes</h2>
    <form class="d-flex" action="{{ route('customers.index') }}" method="GET">
        <input type="search" class="form-control me-2" placeholder="Buscar cliente..." name="searchQuery" value="{{ $searchQuery }}">
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fas fa-search"></i> <!-- Icono de búsqueda -->
        </button>
    </form>
    <a href="{{ route('customer.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> <!-- Icono de añadir -->
    </a>
</div>

<table class="table mt-4">
    <thead>
        <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 15%;">Nombre</th>
            <th style="width: 10%;">RFC</th>
            <th style="width: 20%;">Dirección</th>
            <th style="width: 10%;">Teléfono</th>
            <th style="width: 20%;">Correo</th>
            <th style="width: 20%;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->rfc }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar al cliente {{$customer->name}}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> <!-- Icono de eliminar -->
                        </button>
                    </form>
                    
                    <a href="{{ route('customer.edit', $customer) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> <!-- Icono de editar -->
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Section -->
<div class="row">
    <div class="col-md-12 text-center mt-4">
        <div class="pagination" style="font-size: 14px;">
            {{ $customers->appends(['searchQuery' => $searchQuery])->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
</div>

@endsection