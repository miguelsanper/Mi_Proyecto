@extends('layouts.app')

@section('content')
@if (session('notification'))
  <div class="alert alert-success">
    {{ session('notification')}}
  </div>
@endif

<section class="bg-dark">
    <!-- CARRUSEL -->
    <div class="row g-0">
      <div class="col-lg-7 d-none d-lg-block">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <!-- Indicadores del carrusel -->
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div
  
          <!-- IMÁGENES DEL CARRUSEL -->
          <div class="carousel-inner">
            <div class="carousel-item doctor min-vh-100 active" style="background-image: url('/assets/img/carretera.jpg'); background-size: cover; background-position: center;">
              <div class="carousel-caption custom-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.7); color: white; padding: 10px;">
                <h5 class="fw-bold">Sobre Nosotros</h5>
                <p>Somos la empresa dedicada a gestionar las cotizacion de tus viajes</p>
              </div>
            </div>
            <div class="carousel-item Historial_Clinico min-vh-100" style="background-image: url('/assets/img/Trailer.png'); background-size: cover; background-position: center;">
              <div class = "carousel-caption custom-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.7); color: white; padding: 10px;">
                <h5 class="fw-bold">Camiones</h5>
                <p>Contamos 2 camiones completamente equipados</p>
              </div>
            </div>
            <div class="carousel-item informacion min-vh-100" style="background-image: url('/assets/img/cotizacion.jpg'); background-size: cover; background-position: center;">
              <div class="carousel-caption custom-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.7); color: white; padding: 10px;">
                <h5 class="fw-bold">Cotizaciones</h5>
                <div class="d-flex justify-content-center">
                  <p class="me-2">Apoyo en tu realización de cotizaciones</p><a href="#" class="text-decoration-none">adm.soulcare@gmail.com</a>
                </div>
              </div>
            </div>
          </div>
          <!-- FIN DE IMÁGENES DEL CARRUSEL -->
  
          <!-- Botones de control del carrusel -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <!-- FIN DE CARRUSEL -->
  
      <!-- LOGIN -->
      <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
        <!-- LOGO -->
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 text-center">
          <img src="{{ asset('assets/img/Tarifacil.png') }}" class="img-fluid" style="width: 10rem;">
        </div>
        <!-- FIN DE LOGO -->
  
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
          <h1 class="fw-bold mb-4 text-light text-decoration-none">Bienvenido de vuelta</h1>
  
          <!-- FORMULARIO DE INICIO DE SESIÓN -->
          <form method="POST" action="{{ route('inicia-sesion') }}" class="mb-4">
            @csrf
            
            <div class="mb-4">
                <label for="emailInput" class="form-label fw-bold text-light text-decoration-none">Email</label>
                <input type="email" name="email" class="form-control bg-dark-x border-0 fs-5 @error('email') is-invalid @enderror" placeholder="Ingresa tu email" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="passwordInput" class="form-label fw-bold text-light text-decoration-none">Contraseña</label>
                <input type="password" name="password" class="form-control bg-dark-x border-0 mb-2 fs-5 @error('password') is-invalid @enderror" placeholder="Ingresa tu contraseña" id="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <hr>
            <hr>
            <button type="submit" class="btn btn-primary w-100 fw-bold fs-6" style="height: 50px;">Iniciar sesión</button>
        </form>
        
          <!-- FIN DE FORMULARIO DE INICIO DE SESIÓN -->
          <!--text-muted-->
          {{-- <p class="fw-bold text-center text-light text-decoration-none">O inicia sesión con</p> --}}
  
          <!-- Botones de inicio de sesión con redes sociales -->
          {{-- <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-outline-light flex-grow-1 me-2"> <i class="fa-brands fa-google lead me-2"></i> Google</button>
            <button type="submit" class="btn btn-outline-light flex-grow-1 ms-2"> <i class="fa-brands fa-facebook-f lead me-2"></i> Facebook</button>
          </div> --}}
        </div>
  
        <!-- Enlace para crear una nueva cuenta -->
        <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
          <p class="d-inline-block mb-0 px-lg-1 text-light text-decoration-none">¿Todavía no tienes una cuenta?</p> <a href="{{ route('registro') }}" class="text-light fw-bold text-decoration-none">Crea una ahora</a>
        </div>
      </div>
      <!-- FIN DE LOGIN-->
    </div>
</section>
@endsection

