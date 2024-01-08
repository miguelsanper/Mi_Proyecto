@extends('administrar')

@section('content2')
    <form action="{{ route('customers.update', $customer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del cliente</label>
            <input type="text" class="form-control" id="nombre" name="nombre" 
            value="{{ $customer->name }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">RFC</label>
            <input type="text" class="form-control" id="rfc" name="rfc"
                value="{{ $customer-> rfc}}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="address" name="direccion"
                value="{{ $customer-> address}}">
        <div class="mb-3">
            <label for="phone" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="phone" name="telefono"
                value="{{ $customer-> phone}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="text" class="form-control" id="email" name="correo"
                value="{{ $customer-> email}}">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('customers.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection