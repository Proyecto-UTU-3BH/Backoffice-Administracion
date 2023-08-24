<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Usuarios</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/listar.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    
    <h2>Listado de Usuarios</h2>
    <div class="container">
        <div class="insertar">
            <a href="{{ route('crearUsuario') }}"><button>Crear Usuario</button></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Calle</th>
                    <th>Nº Puerta</th>
                    <th>Cedula de Identidad</th>
                    <th class="modificar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->primer_nombre }}</td>
                    <td>{{ $usuario->primer_apellido }}
                         @if($usuario->segundo_apellido!= null)  {{ $usuario->segundo_apellido }} @endif </td>
                    <td>{{ $usuario->tipo }}</td>
                    <td>{{ $usuario->usuario }}</td>
                    <td>{{ $usuario->calle }}</td>
                    <td>{{ $usuario->numero_de_puerta }}</td>
                    <td>{{ $usuario->ci }}</td>
                    <td class="modificar">
                        <a href="#"> <button> Modificar </button> </a>
                    </td>
                    <td class="eliminar">
                        <form action="{{ route('eliminarUsuario', ['idUsuario' => $usuario->id]) }}" method="POST">
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