<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
        }

        #sidebar {
            color: #fff;
            height: 100vh;
            width: 32vh;
            overflow-y: hidden;
            text-align: center;
            background: linear-gradient(to bottom, #007bff, #0056b3); /* Degradado de azul */
        }

        #sidebar img {
            display: block;
            margin: 0 auto;
        }

        #sidebar .nav-link {
            color: #fff;
            font-size: 25px;
            text-align: center;
            border-radius: 15px;
            margin-top: 40px;
            padding: 10px;
            transition: background-color 0.3s;
        }

        #sidebar .nav-link:hover {
            background-color: #004c9d;
        }

        #sidebar .active {
            background-color: #042c57;
        }

        #sidebar h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        #sidebar .nav-item {
            margin-top: 10px;
        }

        
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-5 col-lg-2 d-md-block sidebar">
                <a class="navbar-brand" onclick="redirectToPrivada()" style="cursor: pointer;">
                    <img class="imagen" src="{{ asset('images/tarifacil.png') }}" alt="Logo" style="width: 13rem;">
                </a>
                <h2 style="margin-top: 50px">Catálogo</h2>
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        {{-- <li class="nav-item" style="margin-top: 30px">
                            <a class="nav-link" href="#">
                                Usuarios
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.index') }}">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drivers.index') }}">
                                Choferes
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                Cotizaciones
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trailers.index') }}">
                                Trailers
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                Viajes Terminados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Estatus
                            </a>
                        </li> --}}
                        <!-- Puedes agregar más opciones según sea necesario -->
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('content2')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Script para desenmarcar la opción anterior al hacer clic en otra opción -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        var navLinks = document.querySelectorAll(".nav-link");
        var activeLink = localStorage.getItem("activeLink");

        // Restaurar la clase "active" al enlace almacenado localmente
        if (activeLink) {
            navLinks.forEach(function (link) {
                link.classList.remove("active");
            });
            document.querySelector(".nav-link[href='" + activeLink + "']").classList.add("active");
        } else {
            // Si no hay enlace almacenado localmente, no establecer la clase "active" inicialmente
        }

        navLinks.forEach(function (link) {
            link.addEventListener("click", function (event) {
                // Remover la clase "active" de todos los enlaces
                navLinks.forEach(function (otherLink) {
                    otherLink.classList.remove("active");
                });

                // Agregar la clase "active" solo al enlace pulsado
                this.classList.add("active");

                // Almacenar el enlace activo en el almacenamiento local
                localStorage.setItem("activeLink", this.getAttribute("href"));
            });
        });

        // Agregar evento de clic a la imagen
        var logoImage = document.querySelector(".navbar-brand img");
        logoImage.addEventListener("click", function () {
            // Redireccionar a la ruta 'privada'
            window.location.href = "{{ route('privada') }}";
        });
    });
    </script>
</body>
</html>

