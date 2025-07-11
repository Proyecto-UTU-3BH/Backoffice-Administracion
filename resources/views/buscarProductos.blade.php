<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Buscar Productos de un Almacen</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Buscar Productos de un Almacen</h2>
    <div id="container">
        <form action="/almacena/verProductosEnAlmacen/" method="get">
            @csrf

            <div class="form-group">
                <label for="name">ID Almacen:</label>
                <input type="number" id="almacen_id" name="almacen_id" required>
            </div>

            <input type="submit" value="Buscar">
        </form>
    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>