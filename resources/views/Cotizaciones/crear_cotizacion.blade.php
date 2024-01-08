@extends('layouts.app')

@section('content')

<style>
    .container-fluid {
        position: relative;
    }

    .navbar-brand {
        position: absolute;
        top: 10px; /* Ajusta la posición vertical según tus necesidades */
        left: 10px; /* Ajusta la posición horizontal según tus necesidades */
        z-index: 2; /* Asegura que esté por encima de las otras capas */
    }

    .bg-image {
        background-size: cover;
        height: 100vh;
        position: relative;
    }
</style>

<script>
    // Función para redirigir al usuario a la ruta privada al hacer clic en la imagen
    function redirectToPrivada() {
        window.location.href = "{{ route('privada') }}";
}
</script>
    <div class="container-fluid">
        <a class="navbar-brand" onclick="redirectToPrivada()">
            <img class="imagen" src="{{ asset('images/volver.png') }}" alt="Logo" style="width: 6rem; cursor: pointer">
        </a>
        
        <div class="row">
            <div class="col-md-6 bg-image" style="background-image: url('{{ asset('images/cotizacion.jpg') }}'); background-size: cover; height: 100vh;">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">Crear Cotización</h2>
                <form action="{{ route('cotizacion.ver') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_search" class="form-label">Cliente</label>
                        <div class="input-group">
                            <select class="form-select" id="customer" name="customer" required>
                                <option value="" selected disabled>Selecciona un cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estimated_date" class="form-label">Fecha Estimada de Viaje</label>
                        <input type="date" class="form-control" id="estimated_date" name="estimated_date" required>
                    </div>
                    <div><label for="origin_state" class="form-label">Origen</label></div>
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input type="text" class="form-control" id="origin_state" name="origin_state" placeholder="Estado" required>
                        </div>
                        <div class="mb-3 me-3">
                            <input type="text" class="form-control" id="origin_city" name="origin_city" placeholder="Ciudad" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="origin_neighborhood" name="origin_neighborhood" placeholder="Colonia" required>
                        </div>
                    </div>

                    <!-- Repite el mismo formato para el destino -->
                    <div>
                        <label for="destination_state" class="form-label">Destino</label>
                    </div>
                         
                    <div class="d-flex">
                        <div class="mb-3 me-3">
                            <input type="text" class="form-control" id="destination_state" name="destination_state" placeholder="Estado" required>
                        </div>
                        <div class="mb-3 me-3">
                            <input type="text" class="form-control" id="destination_city" name="destination_city" placeholder="Ciudad" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="destination_neighborhood" name="destination_neighborhood" placeholder="Colonia" required>
                        </div>
                    </div>
            
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso de Carga (Toneladas)</label>
                        <input type="text" class="form-control" id="weight" name="weight" required>
                    </div>

                    {{--<div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="kilometers" class="form-label">Distancia (kms)</label>
                                <div>
                                    <input type="text" class="form-control" id="kilometers" name="kilometers" style="font-size: 110%;" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="gasoline" class="form-label">Combustible (Lts)</label>
                                <div>
                                    <input type="text" class="form-control" id="gasoline" name="gasoline" style="font-size: 110%;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="cost" class="form-label">Costo de Viaje ($)</label>
                        <div class="row align-items-center">
                            <div class="col-9">
                                <div>
                                    <input type="text" class="form-control" id="cost" name="cost" style="font-size: 110%;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    
                    
                    <div class="d-flex justify-content-between">
                        <a href="privada" class="btn btn-danger order-1">Cancelar</a>
                        <button type="submit" class="btn btn-primary order-2">Calcular</button>
                    </div>          
                </form>
            </div>
        </div>
    </div>
@endsection



