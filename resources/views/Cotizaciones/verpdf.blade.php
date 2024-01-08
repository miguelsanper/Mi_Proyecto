<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        h6 {
            text-align: right;
            margin-bottom: 40px; /* Ajusta el margen inferior */
        }
        h4 {
            text-align: left;
            margin-bottom: 30px; /* Ajusta el margen inferior */
            border-top: 2px solid #007bff; /* Color del borde a tu preferencia */
            padding-top: 10px; /* Espaciado superior para separar el borde del texto */
        
        }
        h3 {
            text-align: right;
            margin-top: 30px; /* Ajusta el margen superior */
            color: #007bff; /* Cambia el color del texto a tu preferencia */
            border-bottom: 2px solid #007bff; /* Borde inferior */
            margin-bottom: 30px;
            padding-bottom: 5px; /* Espaciado inferior para separar el borde del texto */
        }

        h5 {
            text-align: left;
            margin-bottom: 3px; /* Ajusta el margen inferior */
        }

        p {
            text-align: left;
            margin-bottom: 0px; /* Ajusta el margen inferior */
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
        }

        h1 {
            text-align: right;
            color: #007bff;
        }

        .list-group-item {
            background-color: #f8f9fa;
            border: none;
            margin-bottom: 0px; /* Ajusta el margen inferior */
        }

        .list-group-item span {
            font-weight: bold;
        }

        .last-p {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Borde inferior de la celda */
        }

        table td.value {
            text-align: left;
        }

        .header-image {
            width: 100%;
            height: auto;
            margin-bottom: 20px; /* Ajusta el margen inferior de la imagen */
        }
    </style>

    <title>Cotización 00{{$cotizacion->id}}</title>
</head>

<body>

    <div class="container">
        <img src="images/tarifacilsuperior.png" alt="Encabezado" class="header-image">

        <h1>Cotización N°: 00{{$cotizacion->id}}</h1>
        <h6>Fecha de cotización: {{$cotizacion->date}}</h6>

        <h5>Tarifacil</h5>
        <p>6ta avenida, 508, Laguna de la Puerta</p>
        <p>Tampico, Tamaulipas, 89000</p>
        <p>Telefono: 833 999 9999</p>
        <p class="last-p">Correo: tarifacil@cotiza.com </p>

        <h4>Descripcion:</h4>

        <table class="table">
            <tbody>
                <tr>
                    <td>Cliente:</td>
                    <td class="value">{{$nombre}}</td>
                </tr>
                <tr>
                    <td>Fecha estimada de viaje:</td>
                    <td class="value">{{$cotizacion->estimated_date}}</td>
                </tr>
                <tr>
                    <td>Origen:</td>
                    <td class="value">{{$cotizacion->origin}}</td>
                </tr>
                <tr>
                    <td>Destino:</td>
                    <td class="value">{{$cotizacion->destination}}</td>
                </tr>
                <tr>
                    <td>Kilometros recorridos:</td>
                    <td class="value" >{{$cotizacion->kilometers}}</td>
                </tr>
                <tr>
                    <td>Peso de carga:</td>
                    <td class="value" >{{$cotizacion->weight}} ton</td>
                </tr>
            </tbody>
        </table>

        <!-- Se agregó el costo total fuera de la tabla -->
        <h3>Costo Total: ${{$cotizacion->cost}}</h3>

        <p>Vigencia de cotizacion:</p>
        <p>10 dias habiles a partir de la fecha de cotizacion</p>
    </div>
</body>

</html>