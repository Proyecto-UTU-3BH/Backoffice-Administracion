<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Registrar Conducción</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Registrar Conducción</h2>
    <div id="container">
        <form action="/maneja/manejar" method="post">
            @csrf
            <div class="form-group">
                <label for="usuario_id">ID Chofer:</label>
                <input type="number" id="usuario_id" name="usuario_id" required>
                @if($errors->has('usuario_id'))
                    <span class="error">{{ $errors->first('usuario_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="vehiculo_id">ID Vehiculo:</label>
                <input type="number" id="vehiculo_id" name="vehiculo_id" required>
                @if($errors->has('vehiculo_id'))
                    <span class="error">{{ $errors->first('vehiculo_id') }}</span>
                @endif
            </div>

            <input type="submit" value="Crear">
        </form>
    </div>


    <br>

    @isset($mensaje)
    <span>{{$mensaje}}</span>
    @endisset
</body>
</html>