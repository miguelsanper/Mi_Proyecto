@extends('administrar')

@section('content2')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Trailers</h2>
        <form class="d-flex" action="{{ route('trailers.index') }}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Buscar Trailer..." name="searchQuery" value="{{ $searchQuery }}">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <a href="{{ route('trailer.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número Económico</th>
                <th>Tamaño</th>
                <th>Chofer</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trailers as $trailer)
            
                <tr>
                    <td>{{ $trailer->id }}</td>
                    <td>{{ $trailer->economic_number }}</td>
                    <td>{{ $trailer->size }}</td>
                    <td>
                        @if ($trailer->driver)
                            {{ $trailer->driver->name }}
                        @else
                            Sin chofer
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('trailers.destroy', $trailer->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar al trailer {{$trailer-> economic_number}}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            <a href="{{ route('trailer.edit', $trailer) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

<!-- Pagination Section -->
<div class="row">
    <div class="col-md-12 text-center mt-4">
        <div class="pagination" style="font-size: 14px;">
            {{ $trailers->appends(['searchQuery' => $searchQuery])->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
