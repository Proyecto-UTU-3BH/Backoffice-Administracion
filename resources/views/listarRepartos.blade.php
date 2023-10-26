<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Repartos</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Repartos</h2>
    <div class="container">
        <div class="insertar">
            <a href="#"><button>Ingresar Reparto</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Producto</th>
                    <th>ID Almacen</th>
                    <th>ID Vehiculo</th>
                    <th>Fecha Realización</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($repartos as $reparto)
                <tr>
                    <td>{{ $reparto->id }}</td>
                    <td>{{ $reparto->producto_id }}</td>
                    <td>{{ $reparto->almacen_id }}</td>
                    <td>{{ $reparto->vehiculo_id }}</td>
                    <td>{{ $reparto->fechaRealizacion }}</td>
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