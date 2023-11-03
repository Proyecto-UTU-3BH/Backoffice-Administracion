<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Lotes Chofer</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Lotes de un Chofer</h2>
    <div class="container">
        <div class="insertar">
            <a href="#"><button>Ver Ruta</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>IDLote</th>
                    <th>Destino</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($lotesDestinos as $loteDestino)
                <tr>
                    <td>{{ $loteDestino->IDLote }}</td>
                    <td>{{ $loteDestino->destino }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>