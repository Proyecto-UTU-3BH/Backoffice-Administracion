<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modificar Gestiona</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/crearAlmacen.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Gestiona</h2>
    <div id="container">
        <form action="/gestiona/modificarLote/{{$gestiona->id}}" method="post">
            @csrf

            <div class="form-group">
                <label for="IDLote">IDLote:</label>
                <input type="number" id="IDLote" name="IDLote" value="{{$gestiona->IDLote}}" required>
                @if($errors->has('IDLote'))
                    <span class="error">{{ $errors->first('IDLote') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="producto_id">ID Producto</label>
                <input type="number" id="producto_id" name="producto_id" value="{{$gestiona->producto_id}}" required>
                @if($errors->has('producto_id'))
                    <span class="error">{{ $errors->first('producto_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="vehiculo_id">ID Vehículo:</label>
                <input type="number" id="vehiculo_id" name="vehiculo_id" value="{{$gestiona->vehiculo_id}}" required>
                @if($errors->has('vehiculo_id'))
                    <span class="error">{{ $errors->first('vehiculo_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="usuario_id">ID Usuario:</label>
                <input type="number" id="usuario_id" name="usuario_id" value="{{$gestiona->usuario_id}}" required>
                @if($errors->has('usuario_id'))
                    <span class="error">{{ $errors->first('usuario_id') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="{{$gestiona->fecha}}" required>
                @if($errors->has('fecha'))
                    <span class="error">{{ $errors->first('fecha') }}</span>
                @endif
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>

</body>
</html>