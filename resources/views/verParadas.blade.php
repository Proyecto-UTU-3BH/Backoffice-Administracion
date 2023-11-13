<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Paradas</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Paradas de Ruta: {{$idRuta}}</h2>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Ruta ID</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($paradas as $parada)
                <tr>
                    <td>{{ $parada->ruta_id }}</td>
                    <td>{{ $parada->latitud }}</td>
                    <td>{{ $parada->longitud }}</td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarParada', ['idParada' => $parada->id]) }}" method="POST">
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