<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Almacenes</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Almacenes</h2>
    <div id="container">
        <form action="/almacenes/crearAlmacen" method="post">
            @csrf
            <label for="latitud">Latitud:</label>
            <input type="number" id="latitud" name="latitud" step="0.000001" required><br>

            <label for="longitud">Longitud:</label>
            <input type="number" id="longitud" name="longitud" step="0.000001" required><br>

            <label for="capacidad">Capacidad de Almacenamiento:</label>
            <input type="number" id="capacidad" name="capacidad" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" pattern="[0-9]{9,15}" required><br>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>