<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Reparto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Reparto</h2>
    <div id="container">
        <form action="/reparto/modificarReparto/{{$reparto->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="producto_id">ID Producto:</label>
                <input type="number" id="producto_id" name="producto_id" value="{{$reparto->producto_id}}" required>
                @if($errors->has('producto_id'))
                    <span class="error">{{ $errors->first('producto_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="almacen_id">ID Almacen:</label>
                <input type="number" id="almacen_id" name="almacen_id" value="{{$reparto->almacen_id}}" required>
                @if($errors->has('almacen_id'))
                    <span class="error">{{ $errors->first('almacen_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="vehiculo_id">ID Vehiculo:</label>
                <input type="number" id="vehiculo_id" name="vehiculo_id" value="{{$reparto->vehiculo_id}}" required>
                @if($errors->has('vehiculo_id'))
                    <span class="error">{{ $errors->first('vehiculo_id') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label for="fechaRealizacion">Fecha Realizacion:</label>
                <input type="date" id="fechaRealizacion" name="fechaRealizacion" value="{{$reparto->fechaRealizacion}}" required>
                @if($errors->has('fechaRealizacion'))
                    <span class="error">{{ $errors->first('fechaRealizacion') }}</span>
                @endif
            </div>

            <input type="submit" value="Modificar">
        </form>
    </div>

</body>
</html>