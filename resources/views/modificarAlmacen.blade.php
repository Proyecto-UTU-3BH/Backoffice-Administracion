<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Almacen</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Almacen</h2>

    <div id="container">
    <form action="/almacenes/modificarAlmacen/{{$almacen->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input type="text" id="departamento" name="departamento" class="remove-br" value="{{$almacen->departamento}}" required>
                @if($errors->has('departamento'))
                    <span class="error">{{ $errors->first('departamento') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" id="calle" name="calle" class="remove-br" value="{{$almacen->calle}}" required>
                @if($errors->has('calle'))
                    <span class="error">{{ $errors->first('calle') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="numero_puerta">Nº Puerta</label>
                <input type="number" id="numero_puerta" name="numero_puerta" class="remove-br" value="{{$almacen->numero_puerta}}" required>
                @if($errors->has('numero_puerta'))
                    <span class="error">{{ $errors->first('numero_puerta') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="latitud">Latitud:</label>
                <input type="number" id="latitud" name="latitud" step="0.000001" class="remove-br" value="{{$almacen->latitud}}" required>
                @if($errors->has('latitud'))
                    <span class="error">{{ $errors->first('latitud') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="longitud">Longitud:</label>
                <input type="number" id="longitud" name="longitud" step="0.000001"  class="remove-br" value="{{$almacen->longitud}}" required>
                @if($errors->has('longitud'))
                    <span class="error">{{ $errors->first('longitud') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad de Almacenamiento:</label>
                <input type="number" id="capacidad" name="capacidad" class="remove-br" value="{{$almacen->capacidad}}" required>
                @if($errors->has('capacidad'))
                    <span class="error">{{ $errors->first('capacidad') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" pattern="[0-9]{9,15}" class="remove-br" value="{{$almacen->telefono}}" required>
                @if($errors->has('telefono'))
                    <span class="error">{{ $errors->first('telefono') }}</span>
                @endif
            </div>

            <input type="submit" value="Enviar">
        </form>
        
    </div>
</body>
</html>