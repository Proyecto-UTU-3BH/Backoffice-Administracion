<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Usuario</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Usuario</h2>

    <div id="container">
        <form action="/usuarios/modificarUsuario/{{$usuario->id}}" method="post">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{$usuario->name}}" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{$usuario->email}}" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="password" placeholder="8 digitos" value="{{$usuario->password}}" required><br>

            <input type="submit" value="Modificar">
        </form>

    </div>
</body>
</html>