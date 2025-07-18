<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Lotes</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')

    <h2>Listado de Lotes</h2>
    <div class="container">
        <div class="insertar">
            <a href="{{ route('asignarLote') }}"><button>Asignar Lote</button></a>
            <a href="{{ route('buscarLotesChofer') }}"><button>Buscar Lotes Chofer</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Lote</th>
                    <th>ID Producto</th>
                    <th>ID Vehiculo</th>
                    <th>Fecha</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($lotes as $lote)
                <tr>
                    <td>{{ $lote->IDLote }}</td>
                    <td>{{ $lote->producto_id }}</td>
                    <td>{{ $lote->vehiculo_id }}</td>
                    <td>{{ $lote->fecha }}</td>
                    <td class="modificar">
                        <a href="{{ route('modificarGestiona', ['idGestiona' => $lote->id]) }}"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarGestiona', ['idGestiona' => $lote->id]) }}" method="POST">
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