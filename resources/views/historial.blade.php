@extends('layouts.app')

@section('content')

<style>
    /* Estilo general para tarjetas */
    .card {
        transition: box-shadow 0.3s ease; /* Agrega una transición suave a la sombra de la tarjeta */
    }

    /* Estilo para las tarjetas cuando el ratón está sobre ellas */
    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Aumenta la sombra al pasar el ratón */
        cursor: pointer;
    }
    .navbar {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom: 20px;
        border-radius: 10px; /* Añade bordes redondeados a la barra de navegación */
        margin-top: 20px; /* Agrega un margen superior para separar del borde superior */
    }
    /* Estilo para resaltar la tarjeta activa */
    .card.active {
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3); /* Aumenta aún más la sombra para resaltar la tarjeta activa */
    }
    .navbar-brand {
        font-size: 1.5rem;
        margin-right: 20px;
    }
    .navbar-brand img {
        max-width: 100%;
        height: auto;S
    }
    .navbar-toggler {
        border: none;
        outline: none;
    }
    .form-inline .form-control {
        width: 250px;
        border-radius: 3px;
        margin-right: 10px;
    }
    .form-inline .btn {
        border-radius: 3px;
    }
    .imagen {
        cursor: pointer;
    }
</style>

<script>
    // Función para redirigir al usuario a la ruta privada al hacer clic en la imagen
    function redirectToPrivada() {
        window.location.href = "{{ route('privada') }}";
    }
</script>

<div class="container">
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand" onclick="redirectToPrivada()" style="margin-right: 15%">
                <img class="imagen" src="{{ asset('images/tarifacil.png') }}" alt="Logo" style="width: 12rem;">
            </a>
            <a class="navbar-brand" style="font-size: 30px;">Historial de Cotizaciones</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <form class="d-flex form-inline" action="{{ route('privada2') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Buscar..." name="searchQuery"
                            value="{{ $searchQuery ?? '' }}">
                        <button type="submit" class="btn btn-outline-success">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    
    <!-- Historial Section -->
    <div class="row mt-3">
        @forelse ($cotizaciones as $historial)
            <div class="col-md-3 mb-4">
                <div class="card bg-light border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary"> Cliente: {{ $historial->customer->name }}</h5>
                        <ul class="list-unstyled">
                            <li><strong>Cotizacion:</strong> {{ $historial->id }}</li>
                            <li><strong>Fecha:</strong> {{ $historial->date }}</li>
                            <li><strong>Origen:</strong> {{ $historial->origin }}</li>
                            <li><strong>Destino:</strong> {{ $historial->destination }}</li>
                            <li><strong>Costo:</strong> ${{ number_format(floatval($historial->cost), 2) }}</li>
                            <li><strong>Status:</strong> {{ $historial->status }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ver_pdf', ['id' => $historial->id]) }}" class="btn btn-primary">Ver PDF</a>
                            <div>
                                <button class="btn btn-success", 'aceptado')">
                                Aceptado
                            </button>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        @empty
        @endforelse
        <div class="row">
            <div class="col-md-12 text-center mt-4">
                <div class="pagination" style="font-size: 14px;">
                    {{ $cotizaciones->appends(['cotizaciones' => $searchQuery])->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function cambiarEstado(estadoUrl, nuevoEstado) {
            // Puedes implementar la lógica para cambiar el estado, por ejemplo, mediante una solicitud AJAX
            if (nuevoEstado && (nuevoEstado.toLowerCase() === 'aceptado' || nuevoEstado.toLowerCase() === 'rechazado')) {
                // Aquí puedes realizar la solicitud AJAX para cambiar el estado
                // En este ejemplo, simplemente se muestra un mensaje de éxito
                alert("Estado cambiado con éxito a " + nuevoEstado);
            } else {
                alert("Ingrese un estado válido (Aceptado o Rechazado)");
            }
        }
    </script>
@endsection