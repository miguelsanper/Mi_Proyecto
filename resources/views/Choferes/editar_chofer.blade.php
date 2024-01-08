@extends('administrar')

@section('content2')
    <form action="{{ route('drivers.update', $driver) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del chofer</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $driver->name }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="address" name="direccion"
                value="{{ $driver-> address}}">
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="telefono"
                value="{{ $driver-> phone}}">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('drivers.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection