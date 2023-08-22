<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Producto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/formularioProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Producto</h2>
    <div id="container">
        <form action="/productos/crearProducto" method="post">
            @csrf
            <div class="columna">
                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" required><br>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="en central">En Central</option>
                    <option value="en transito">En Tránsito</option>
                    <option value="almacen final">Almacén Final</option>
                    <option value="en domicilio">En Domicilio</option>
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

                <label for="remitente">Remitente:</label>
                <input type="text" id="remitente" name="remitente" required><br>

                <label for="destinatario">Destinatario:</label>
                <input type="text" id="destinatario" name="nombre_destinatario" required><br>

            </div>

            <div class="columna">

                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle" required><br>

                <label for="numero_puerta">Nº Puerta:</label>
                <input type="text" id="numero_puerta" name="numero_puerta" required><br>

                <label for="forma_entrega">Forma de Entrega:</label>
                <select id="forma_entrega" name="forma_entrega" required>
                    <option value="reparto">Reparto</option>
                    <option value="pick up">Pick Up</option>
                </select>

                <br>

                <label for="peso">Peso(kg)</label>
                <input type="number" id="peso" name="peso" step="0.01" required><br>

            </div>

            <input type="submit" value="Enviar">
    </form>

    </div>

    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>