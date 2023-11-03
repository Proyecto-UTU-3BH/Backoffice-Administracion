<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Crear Paradas</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Crear Paradas</h2>
    <div id="container">
        <form action="/rutas/crearParada" method="post">
            @csrf
            <div class="form-group">
                <label for="ruta_id">ID Ruta:</label>
                <input type="number" id="ruta_id" name="ruta_id" value="{{$idRuta}}" required>
                @if($errors->has('ruta_id'))
                    <span class="error">{{ $errors->first('ruta_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="latitud">Latitud:</label>
                <input type="number" id="latitud" name="latitud" step="0.000001" required>
                @if($errors->has('latitud'))
                    <span class="error">{{ $errors->first('latitud') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="longitud">Longitud:</label>
                <input type="number" id="longitud" name="longitud" step="0.000001"  required>
                @if($errors->has('longitud'))
                    <span class="error">{{ $errors->first('longitud') }}</span>
                @endif
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