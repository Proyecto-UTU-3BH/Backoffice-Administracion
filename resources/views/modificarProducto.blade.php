<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Producto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/formularioProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Producto</h2>

    <div id="container">
        <form action="/productos/modificarProducto/{{$producto->id}}" method="post">
            @csrf

            <div class="columna">

                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" value="{{$producto->destino}}" required><br>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="en central">En Central</option>
                    <option value="en transito" @if($producto->estado == 'en transito') selected @endif>En Tránsito</option>
                    <option value="almacen final" @if($producto->estado == 'almacen final') selected @endif>Almacen Final</option>
                    <option value="en domicilio" @if($producto->estado == 'en domicilio') selected @endif>En Domicilio</option>
                </select>

                <br>

                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="Carta">Carta</option>
                    <option value="Sobre chico" @if($producto->tipo == 'Sobre chico') selected @endif>Sobre Chico</option>
                    <option value="Sobre grande" @if($producto->tipo == 'Sobre grande') selected @endif>Sobre Grande</option>
                    <option value="Paquete chico" @if($producto->tipo == 'Paquete chico') selected @endif>Paquete Chico</option>
                    <option value="Paquete mediano" @if($producto->tipo == 'Paquete mediano') selected @endif>Paquete Mediano</option>
                    <option value="Paquete grande" @if($producto->tipo == 'Paquete grande') selected @endif>Paquete Grande</option>
                    <option value="Otro" @if($producto->tipo == 'Otro') selected @endif>Otro</option>
                </select>

                <br>

                <label for="remitente">Remitente:</label>
                <input type="text" id="remitente" name="remitente" value="{{$producto->remitente}}" required><br>

                <label for="destinatario">Destinatario:</label>
                <input type="text" id="destinatario" name="destinatario" value="{{$producto->nombre_destinatario}}" required><br>

            </div>

            <div class="columna">

                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" value="{{$producto->calle}}"><br>

                <label for="numero_puerta">Nº Puerta:</label>
                <input type="text" id="numero_puerta" name="numero_puerta" value="{{$producto->numero_puerta}}"><br>

                <label for="forma_entrega">Forma de Entrega:</label>
                <select id="forma_entrega" name="forma_entrega" required>
                    <option value="reparto" @if($producto->forma_entrega == 'reparto') selected @endif>Reparto</option>
                    <option value="pick up" @if($producto->forma_entrega == 'pick up') selected @endif>Flete</option>
                </select>

                <br>

                <label for="peso">Peso(kg):</label>
                <input type="number" id="peso" name="peso" step="0.01" value="{{$producto->peso}}" required><br>

            </div>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <br>

</body>
</html>