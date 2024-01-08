<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TariFacil - Inicio</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <style>
        body {
            background-image: url("{{ asset('images/fondo.png') }}");
            background-position: center center;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            margin: 0;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
            color: rgb(34, 0, 69);
            overflow-y: hidden; /* Oculta la barra de desplazamiento vertical */
        }

        header {
            background: linear-gradient(to bottom, rgba(52, 5, 99, 1), rgba(52, 5, 99, 0.5));
            color: white;
            font: 1em "Open Sans", sans-serif, bold;
            text-align: center;
            padding: 1em;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Alinea verticalmente los elementos en el centro */
        }

        .logotipo {
            width: 25em;
            height: 12em;
            margin: auto; /* Centra horizontalmente la imagen */
            margin-right: 12em;
        }

        .dropdown {
            position: relative;
            float: right;
            margin-right: 1em;
            font-size: 1.5em;
            margin-top: 1em;
        }

        .dropdown hr {
            margin: 0.5em 0;
            border: none;
            border-top: 1px solid white;
        }

        ul {
            padding: 0;
            margin: 0.5em 0 0 0;
            list-style: none;
        }

        .cuerpo {
            text-align: center;
        }

        .contenedor {
            display: flex;
            justify-content: center;
        }

        .columna-texto {
            flex: 1.5;
            font-size: 3.3em;
            margin-left: 20%
        }

        .columna-botones {
            flex: 3;
        }

        button.btn1,
        button.btn2,
        button.btn3 {
            color: rgb(34, 0, 69);
            background-size: 1.8em 1.8em;
            background-repeat: no-repeat;
            background-position: 90% center;
            border-radius: 0.5em;
            border: none;
            cursor: pointer;
            transition: width 0.3s ease;
            width: 70%;
            margin: 0 auto;
            display: block;
            height: 2em;
            font-size: 1.5em;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            position: relative;
            padding-right: 2em;
        }

        button.btn1,
        button.btn2,
        button.btn3 {
            margin-bottom: 1em;
            margin-top: 5%;
        }

        button.btn1 i,
        button.btn2 i,
        button.btn3 i {
            position: absolute; /* Posicionamos el icono de forma absoluta */
            top: 50%; /* Centramos verticalmente */
            transform: translateY(-50%); /* Ajustamos para centrar verticalmente */
            right: 0.5em; /* Ajustamos la posición del icono a la derecha */
            margin-right: 1%
        }

        button.btn1:hover,
        button.btn2:hover,
        button.btn3:hover {
            width: 90%;
        }

        @media (max-width: 1000px) {
            /* Ajustes para pantallas más pequeñas */
            .columna-botones,
            .logotipo,
            .dropdown,
            .columna-texto{
                width: 50%;
                margin-right: 0;
            }

            .columna-texto {
                display: none; /* Oculta los iconos en pantallas más pequeñas */
            }

            .dropdown {
                font-size: 1.3em
            }
        }

        @media (max-width: 700px) {
            /* Ajustes para pantallas más pequeñas */
            button.btn1,
            button.btn2,
            button.btn3 {
                width: 70%;
                margin-right: 0;
            }

            button.btn1 i,
            button.btn2 i,
            button.btn3 i {
                display: none; /* Oculta los iconos en pantallas más pequeñas */
            }
        }

        @media (max-width: 500px) {
            /* Ajustes para pantallas más pequeñas */
            .logotipo,{
                width: 30%;
                margin-right: 0;
            }
        }

        /* Botón Amarillo suave */
        button.btn3 {
            background-color: #ffffcc; /* Puedes ajustar el valor del color según tus preferencias */
            border: 3px dotted #ffcc00; /* Ajusta el grosor y color del contorno según tus preferencias */
        }

        /* Botón Morado suave */
        button.btn2 {
            background-color: #d8b4ff; /* Puedes ajustar el valor del color según tus preferencias */
            border: 3px dotted #af8bff; /* Ajusta el grosor y color del contorno según tus preferencias */
        }

        /* Botón Rojo suave */
        button.btn1 {
            background-color: #ffb4b4; /* Puedes ajustar el valor del color según tus preferencias */
            border: 3px dotted #ff6666; /* Ajusta el grosor y color del contorno según tus preferencias */
        }
        /* Nuevo estilo para resolver el problema de superposición de texto e icono */
    </style>
</head

<body>
    <header>
        <div class="row">
            <img src="{{ asset('images/tarifacil.png') }}" alt="logotipo" class="logotipo">
            <div class="dropdown">
                <div>
                    <i class="fas fa-user"></i>
                    @auth {{ Auth::user()->name }} @endauth
                </div>
                <hr>
                <ul aria-labelledby="userDropdown" id="userDropdownMenu">
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item" style="color: white; font-size: 1em; text-decoration: none;">
                            <i class="fas fa-sign-out-alt" style="margin-right: 0.8em;"></i> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="cuerpo">
        <div class="contenedor">
            <div class="columna-texto">
                <p>Elige lo que deseas realizar</p>
            </div>
            <div class="columna-botones">
                <button onclick="irAgregar()" class="btn1" style="font-size: 3.5em">
                    <i class="fas fa-file-signature"></i> <!-- Icono para el botón Agregar -->
                    Cotizar
                </button>
                <button onclick="irAdministrar()" class="btn2" style="font-size: 3.5em">
                    <i class="fas fa-cogs"></i> <!-- Icono para el botón Gestionar -->
                    Gestionar
                </button>
                <button onclick="irAHistorial()" class="btn3" style="font-size: 3.5em">
                    <i class="fas fa-search"></i> <!-- Icono para el botón Historial -->
                    Historial
                </button>
            </div>
        </div>
    </div>
    

    <script>
        function irAgregar() {
            window.location.href = "{{ route('privada4') }}";
        }

        function irAdministrar() {
            window.location.href = "{{ route('privada3') }}";
        }

        function irAHistorial() {
            window.location.href = "{{ route('privada2') }}";
        }
    </script>
</body>

</html>
