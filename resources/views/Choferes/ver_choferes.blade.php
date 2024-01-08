@extends('administrar')

@section('content2')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Mis Choferes</h2>
    <form class="d-flex" action="{{ route('drivers.index') }}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar Chofer..." name="searchQuery" value="{{ $searchQuery }}">
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fas fa-search"></i> <!-- Icono de búsqueda -->
        </button>
    </form>
    <a href="{{ route('driver.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> <!-- Icono de añadir -->
    </a>
</div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->address }}</td>
                    <td>{{ $driver->phone }}</td>
                    <td>
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar al chofer {{$driver-> name}}?');">
                            @csrf
                            @method('DELETE')
                            <!--boton de eliminar con icono: -->
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> <!-- Icono de eliminar -->
                            </button>
                        </form>
                        
                        <a href="{{ route('driver.edit', $driver) }}" class="btn btn-warning">
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
                {{ $drivers->appends(['searchQuery' => $searchQuery])->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
