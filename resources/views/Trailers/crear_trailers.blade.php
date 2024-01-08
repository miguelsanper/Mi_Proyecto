@extends('administrar')

@section('content2')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-6 bg-image" style="background-image: url('{{ asset('images/trailer.png') }}'); background-size: cover; height: 100vh;">
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="container">
                    <h2 class="mb-4">Crear Trailer</h2>
                    <form action="{{ route('trailer.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="economico" class="form-label">Número Económico</label>
                            <input type="text" class="form-control" id="economico" name="economico" value="">
                        </div>
                        <div class="mb-3">
                            <label for="size" class="form-label">Tamaño de Caja</label>
                            <input type="text" class="form-control" id="size" name="size" value="">
                        </div>

                        <div class="mb-3">
                            <label for="chofer" class="form-label">Chofer</label>
                            <select class="form-select" id="chofer" name="chofer">
                                <option value="">Sin chofer</option>
                                @foreach ($choferes as $chofer)
                                    <option value="{{ $chofer->id }}">{{ $chofer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('trailers.index') }}" class="btn btn-danger">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
