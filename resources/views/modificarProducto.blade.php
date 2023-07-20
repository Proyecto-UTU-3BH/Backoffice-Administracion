<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Producto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Producto</h2>
    <div id="container">
        <form action="/productos/modificarProducto/{{$producto->id}}" method="post">
            @csrf
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" value="{{$producto->destino}}" required><br>

            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="En Almacen">En Almacén</option>
                @if($producto->estado=="En transito")
                <option value="En transito" selected>En Tránsito</option>
                @else
                <option value="En transito">En Tránsito</option>
                @endif

                @if($producto->estado=="En destino")
                <option value="En destino" selected>En Destino</option>
                @else
                <option value="En destino">En Destino</option>
                @endif
            </select>
            
            <br>
            <br>

            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="Carta">Carta</option>
                @if($producto->tipo=="Sobre Chico")
                <option value="Sobre chico" selected>Sobre Chico</option>
                @else
                <option value="Sobre chico">Sobre Chico</option>
                @endif

                @if($producto->tipo=="Sobre grande")
                <option value="Sobre grande" selected>Sobre Grande</option>
                @else
                <option value="Sobre grande">Sobre Grande</option>
                @endif

                @if($producto->tipo=="Paquete chico")
                <option value="Paquete chico" selected>Paquete Chico</option>
                @else
                <option value="Paquete chico">Paquete Chico</option>
                @endif

                @if($producto->tipo=="Paquete mediano")
                <option value="Paquete mediano" selected>Paquete Mediano</option>
                @else
                <option value="Paquete mediano">Paquete Mediano</option>
                @endif

                @if($producto->tipo=="Paquete grande")
                <option value="Paquete grande" selected>Paquete Grande</option>
                @else
                <option value="Paquete grande">Paquete Grande</option>
                @endif

                @if($producto->tipo=="Otro")
                <option value="Otro" selected>Otro</option>
                @else
                <option value="Otro">Otro</option>
                @endif
            </select>
            
            <br>
            <br>

            <label for="peso">Peso(kg)</label>
            <input type="number" id="peso" name="peso" step="0.01" value="{{$producto->peso}}" required><br>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>