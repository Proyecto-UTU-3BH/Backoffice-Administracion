<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Llegada Salida Camiones</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Llegada y Salida de Camiones</h2>
    <div class="container">
        <div class="insertar">
            <a href="#"><button>Ingresar Registro</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Ruta</th>
                    <th>ID Almacen</th>
                    <th>ID Vehiculo</th>
                    <th>Fecha</th>
                    <th>Hora Llegada</th>
                    <th>Hora Salida</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($va as $a)
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->ruta_id }}</td>
                    <td>{{ $a->almacen_id }}</td>
                    <td>{{ $a->vehiculo_id }}</td>
                    <td>{{ $a->fecha }}</td>
                    <td>{{ $a->horallegada }}</td>
                    <td>{{ $a->horasalida }}</td>
                    <td class="modificar">
                        <a href="#"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="#" method="POST">
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