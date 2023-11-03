<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear Ruta</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Ruta</h2>
    <div id="container">
        <form action="/rutas/crearRuta" method="post">
            @csrf
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required><br>

            <label for="recorrido">Recorrido (km):</label>
            <input type="number" id="recorrido" name="recorrido"><br>

            <input type="submit" value="Enviar">
        </form>
    </div>
    <br>
    @isset($mensaje)
        <span>{{$mensaje}}</span>
    @endisset
</body>
</html>
