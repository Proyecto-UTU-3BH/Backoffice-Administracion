<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Producto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Producto</h2>
    <div id="container">
        <form action="/productos/crearProducto" method="post">
            @csrf
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required><br>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="En Almacen">En Almacén</option>
                <option value="En transito">En Tránsito</option>
                <option value="En destino">En Destino</option>
            </select>
            
            <br>

            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="Carta">Carta</option>
                <option value="Sobre chico">Sobre Chico</option>
                <option value="Sobre grande">Sobre Grande</option>
                <option value="Paquete chico">Paquete Chico</option>
                <option value="Paquete mediano">Paquete Mediano</option>
                <option value="Paquete grande">Paquete Grande</option>
                <option value="Otro">Otro</option>
            </select>
            
            <br>

            <label for="peso">Peso(kg)</label>
            <input type="number" id="peso" name="peso" step="0.01" required><br>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>