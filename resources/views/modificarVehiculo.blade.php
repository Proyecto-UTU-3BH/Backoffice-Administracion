<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Vehiculo</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/crearProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Vehiculo</h2>

    <div id="container">
        <form action="/vehiculos/modificarVehiculo/{{$vehiculo->id}}" method="post">
            @csrf
            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="text" id="matricula" name="matricula" value="{{$vehiculo->matricula}}" required>
                @if($errors->has('matricula'))
                    <span class="error">
                        @foreach($errors->get('matricula') as $error)
                            {{ $error }}
                            @if (!$loop->last)
                                , 
                            @endif
                        @endforeach
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select id="tipo" name="tipo" required>
                    <option value="flete" @if($vehiculo->tipo == 'flete') selected @endif>Flete</option>
                    <option value="reparto" @if($vehiculo->tipo == 'reparto') selected @endif>Reparto</option>
                </select>
                @if($errors->has('tipo'))
                    <span class="error">{{ $errors->first('tipo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="en transito" @if($vehiculo->estado == 'en transito') selected @endif>En Tránsito</option>
                    <option value="en almacen" @if($vehiculo->estado == 'en almacen') selected @endif>En Almacén</option>
                </select>
                @if($errors->has('estado'))
                    <span class="error">{{ $errors->first('estado') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" id="capacidad" name="capacidad" step="0.01" value="{{$vehiculo->capacidad}}" required>
                @if($errors->has('capacidad'))
                    <span class="error">{{ $errors->first('capacidad') }}</span>
                @endif
            </div>

            <input type="submit" value="Enviar">
        </form>
    </div>

</body>
</html>