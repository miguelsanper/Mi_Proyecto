@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-5 text-center">
        <h1 class="display-3 text-success mb-4">{{ $mensaje }}</h1>
        <p class="lead mb-4">¡Operación realizada con éxito!</p>
        
        <div class="mt-4">
            <a href="{{ route($ruta) }}" class="btn btn-primary btn-lg">Regresar</a>
        </div>
    </div>
</div>
@endsection