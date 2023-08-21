<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Vehiculos</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Vehiculos</h2>
    <div class="container">
        <div class="insertar">
            <a href="{{ route('crearVehiculo') }}"><button>Crear Vehiculo</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matricula</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->matricula }}</td>
                    <td>{{ $vehiculo->capacidad }}</td>
                    <td>{{ $vehiculo->estado }}</td>
                    <td>{{ $vehiculo->tipo }}</td>
                    <td class="modificar">
                        <a href="{{ route('modificarVehiculo', ['idVehiculo' => $vehiculo->id]) }}"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarVehiculo', ['idVehiculo' => $vehiculo->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Eliminar </button> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>