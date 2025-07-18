<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Productos</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Productos del Almacen <span>{{$almacen}}</span></h2>
    <div class="container">
        <table>
            <thead>
            <tr>
                    <th>ID</th>
                    <th>Codigo Rastreo</th>
                    <th>Destino</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Remitente</th>
                    <th>Destinatario</th>
                    <th>Calle</th>
                    <th>Nº Puerta</th>
                    <th>Forma de Entrega</th>
                    <th>Peso</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->codRastreo }}</td>
                    <td>{{ $producto->destino }}</td>
                    <td>{{ $producto->estado }}</td>
                    <td>{{ $producto->tipo }}</td>
                    <td>{{ $producto->remitente }}</td>
                    <td>{{ $producto->nombre_destinatario }}</td>
                    <td>{{ $producto->calle }}</td>
                    <td>{{ $producto->numero_puerta }}</td>
                    <td>{{ $producto->forma_entrega }}</td>
                    <td>{{ $producto->peso }}</td>
                    <td class="modificar">
                        <a href="{{ route('modificarAlmacena', ['idAlmacena' => $producto->pivot->id]) }}"> <button> Modificar Almacenamiento</button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarAlmacena', ['idAlmacena' => $producto->pivot->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> Eliminar Almacenamiento </button> 
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>