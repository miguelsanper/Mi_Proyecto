@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('C:\laragon\www\Proyecto-Final\public\assets\img\TariFacil.PNG') }}" alt="Logo" style="width: 12rem;">
        </a>
        <a class="navbar-brand" style="font-size: 30px;">Historial de Cotizaciones</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <form class="d-flex form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." name="searchQuery">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Buscar</button>
            </form>
        </div>
    </nav>
    

    <!-- Historial Section -->
    <div class="row mt-5">
        @foreach ($historiales as $historial)
            <div class="col-md-3 mb-4">
                <div class="card bg-light border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $historial->nombre }}</h5>
                        <ul class="list-unstyled">
                            <li><strong>ID:</strong> {{ $historial->id }}</li>
                            <li><strong>Fecha:</strong> {{ $historial->fecha }}</li>
                            <li><strong>Origen:</strong> {{ $historial->origen }}</li>
                            <li><strong>Destino:</strong> {{ $historial->destino }}</li>
                            <li><strong>Costo:</strong> ${{ number_format($historial->costo, 2) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Section -->
    <div class="row">
        <div class="col-md-12 text-center mt-4">
            <div class="pagination" style="font-size: 14px;">
                {{ $historiales->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

