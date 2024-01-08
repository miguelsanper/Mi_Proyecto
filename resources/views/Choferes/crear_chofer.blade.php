@extends('administrar')

@section('content2')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-6 bg-image" style="background-image: url('{{ asset('images/chofer.jpg') }}'); background-size: cover; height: 100vh;">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="container">
                    <h2 class="mb-4">Crear Chofer</h2>
                    <form action="{{ route('driver.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Chofer</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="telefono" value="">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="address" name="direccion" value="">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('drivers.index') }}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
