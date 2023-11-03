<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rutas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Rutas</h2>
    <div class="container">
        <div class="insertar">
            <a href="{{ route('crearRuta') }}"><button>Crear Ruta</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Destino</th>
                    <th>Recorrido</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                    <th class="asignarParadas"></th>
                    <th class="verParadas"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($rutas as $ruta)
                <tr>
                    <td>{{ $ruta->id }}</td>
                    <td>{{ $ruta->destino }}</td>
                    <td>{{ $ruta->recorrido }}</td>
                    <td class="modificar">
                        <a href="{{ route('modificarRuta', ['idRuta' => $ruta->id]) }}"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarRuta', ['idRuta' => $ruta->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Eliminar </button> 
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('vistaParada', ['idRuta' => $ruta->id]) }}"> <button> Asignar Paradas </button> </a>
                    </td>
                    <td>
                        <a href="#"> <button> Ver Paradas </button> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
