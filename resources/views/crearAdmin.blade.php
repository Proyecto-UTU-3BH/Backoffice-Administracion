<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Admin</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Admin</h2>
    <div id="container">
        <form action="/admins/crearAdmin" method="post">
            @csrf
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="password" placeholder="8 digitos" required><br>

            <input type="submit" value="Crear">
        </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>