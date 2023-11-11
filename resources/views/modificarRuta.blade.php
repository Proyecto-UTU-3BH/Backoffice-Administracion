<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Modificar Ruta</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Ruta</h2>

    <div id="container">
        <form action="/rutas/modificarRuta/{{$ruta->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" id="destino" name="destino" value="{{$ruta->destino}}" required>
                @if($errors->has('destino'))
                    <span class="error">{{ $errors->first('destino') }}</span>
                @endif
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
