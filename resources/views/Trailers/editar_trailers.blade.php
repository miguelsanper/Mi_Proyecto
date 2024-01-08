@extends('administrar')

@section('content2')
    <form action="{{ route('trailers.update', $trailer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="economico" class="form-label">Numero económico</label>
            <input type="text" class="form-control" id="economico" name="economico" 
                value="{{ $trailer->economic_number }}">
        </div>
        <div class="mb-3">
            <label for="tamaño" class="form-label">Tamaño</label>
            <input type="text" class="form-control" id="tamaño" name="tamaño"
                value="{{ $trailer->size }}">
        </div>
        <div class="mb-3 d-flex">
            <div class="me-3">
                <label for="chofer" class="form-label">Chofer asignado</label>
                <input type="text" class="form-control" id="chofer" name="chofer" 
                    value="{{ $trailer->driver ? $trailer->driver->name : 'Sin chofer' }}" readonly>
            </div>
        
            <div>
                <label for="chofer_no_asignado" class="form-label">Cambiar por</label>
                <select class="form-select" id="chofer_no_asignado" name="chofer_no_asignado">
                    <option value="">Sin Chofer</option>
                    @foreach ($choferesNoAsignados as $choferNoAsignado)
                        <option value="{{ $choferNoAsignado->id }}">{{ $choferNoAsignado->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('trailers.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection
