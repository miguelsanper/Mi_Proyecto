<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Hola {{ $name }}, bienvenido a LLT !</h2>
    <p>Por favor confirma tu correo electrónico.</p>
    <p>Para ello simplemente debes hacer click en el iguiente enlace:</p>
    
    <a href="{{ url('register/verify/' . $confirmation_code)}}">
        Clic para confirmar correo electronico
    </a>
</body>
</html>