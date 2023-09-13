<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Almacenes</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Almacenes</h2>
    <div class="container">
        <div class="insertar">
            <a href="{{ route('crearAlmacen') }}"><button>Crear Almacen</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Calle</th>
                    <th>Nº Puerta</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Capacidad</th>
                    <th>Telefono</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($almacenes as $almacen)
                <tr>
                    <td>{{ $almacen->id }}</td>
                    <td>{{ $almacen->departamento }}</td>
                    <td>{{ $almacen->calle }}</td>
                    <td>{{ $almacen->numero_puerta }}</td>
                    <td>{{ $almacen->latitud }}</td>
                    <td>{{ $almacen->longitud }}</td>
                    <td>{{ $almacen->capacidad }}</td>
                    <td>{{ $almacen->telefono }}</td>
                    <td class="modificar">
                        <a href="{{ route('modificarAlmacen', ['idAlmacen' => $almacen->id]) }}"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarAlmacen', ['idAlmacen' => $almacen->id]) }}" method="POST">
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