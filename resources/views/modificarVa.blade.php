<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Llegada y Salida de Camiones</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Llegada y Salida de Camiones</h2>
    <div id="container">
        <form action="/va/modificarVa/{{$va->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="ruta_id">ID Ruta:</label>
                <input type="number" id="ruta_id" name="ruta_id" value="{{$va->ruta_id}}" required>
                @if($errors->has('ruta_id'))
                    <span class="error">{{ $errors->first('ruta_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="almacen_id">ID Almacen:</label>
                <input type="number" id="almacen_id" name="almacen_id" value="{{$va->almacen_id}}" required>
                @if($errors->has('almacen_id'))
                    <span class="error">{{ $errors->first('almacen_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="vehiculo_id">ID Vehiculo:</label>
                <input type="number" id="vehiculo_id" name="vehiculo_id" value="{{$va->vehiculo_id}}" required>
                @if($errors->has('vehiculo_id'))
                    <span class="error">{{ $errors->first('vehiculo_id') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="{{$va->fecha}}" required>
                @if($errors->has('fecha'))
                    <span class="error">{{ $errors->first('fecha') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="horallegada">Hora Llegada:</label>
                <input type="time" id="horallegada" name="horallegada" value="{{$va->horallegada}}" required>
                @if($errors->has('horallegada'))
                    <span class="error">{{ $errors->first('horallegada') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="horasalida">Hora Salida:</label>
                <input type="time" id="horasalida" name="horasalida" value="{{$va->horasalida}}" required>
                @if($errors->has('horasalida'))
                    <span class="error">{{ $errors->first('horasalida') }}</span>
                @endif
            </div>

            <input type="submit" value="Modificar">
        </form>
    </div>

</body>
</html>