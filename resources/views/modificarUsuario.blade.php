<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modificar Usuario</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/formularioProductos.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @include('layouts.navigation')
    <h2>Modificar Usuario</h2>
    <div id="container">
        <form action="/usuarios/modificarUsuario/{{$usuario->id}}" method="post">
            @csrf
            <div class="columna">
                <div class="form-group">
                    <label for="primer_nombre">Primer Nombre:</label>
                    <input type="text" id="primer_nombre" name="primer_nombre" value="{{$usuario->primer_nombre}}" required><br>
                    @if($errors->has('primer_nombre'))
                        <span class="error">
                            @foreach($errors->get('primer_nombre') as $error)
                                {{ $error }}
                                @if (!$loop->last)
                                    , 
                                @endif
                            @endforeach
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="segundo_apellido">Segundo Apellido:</label>
                    <input type="text" id="segundo_apellido" name="segundo_apellido" value="{{$usuario->segundo_apellido}}"><br>
                    @if($errors->has('segundo_apellido'))
                        <span class="error">
                            @foreach($errors->get('segundo_apellido') as $error)
                                {{ $error }}
                                @if (!$loop->last)
                                    , 
                                @endif
                            @endforeach
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="usuario" value="{{$usuario->usuario}}" required><br>
                    @if($errors->has('usuario'))
                        <span class="error">{{ $errors->first('usuario') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="calle">Calle:</label>
                    <input type="text" id="calle" name="calle" value="{{$usuario->calle}}" required><br>
                    @if($errors->has('calle'))
                        <span class="error">
                            @foreach($errors->get('calle') as $error)
                                {{ $error }}
                                @if (!$loop->last)
                                    , 
                                @endif
                            @endforeach
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" id="telefono" name="telefono" pattern="[0-9]{9,10}" value="{{$usuario->telefono}}">
                    @if($errors->has('telefono'))
                        <span class="error">{{ $errors->first('telefono') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="password" placeholder="8 digitos" value="{{$usuario->password}}" required><br>
                    @if($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="columna">
                <div class="form-group">
                    <label for="primer_apellido">Primer Apellido:</label>
                    <input type="text" id="primer_apellido" name="primer_apellido" value="{{$usuario->primer_apellido}}" required><br>
                    @if($errors->has('primer_apellido'))
                        <span class="error">
                            @foreach($errors->get('primer_apellido') as $error)
                                {{ $error }}
                                @if (!$loop->last)
                                    , 
                                @endif
                            @endforeach
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="funcionario" @if($usuario->tipo == 'funcionario') selected @endif>Funcionario</option>
                        <option value="chofer" @if($usuario->tipo == 'chofer') selected @endif>Chofer</option>
                    </select><br>
                    @if($errors->has('tipo'))
                        <span class="error">{{ $errors->first('tipo') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="ci">CI:</label>
                    <input type="text" id="ci" name="ci" value="{{$usuario->ci}}" required><br>
                    @if($errors->has('ci'))
                        <span class="error">
                            @foreach($errors->get('ci') as $error)
                                {{ $error }}
                                @if (!$loop->last)
                                    , 
                                @endif
                            @endforeach
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="numero_de_puerta">Nº Puerta:</label>
                    <input type="text" id="numero_de_puerta" name="numero_de_puerta" value="{{$usuario->numero_de_puerta}}" required><br>
                    @if($errors->has('numero_de_puerta'))
                        <span class="error">{{ $errors->first('numero_de_puerta') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="almacen_id">Almacén ID:</label>
                    <input type="number" id="almacen_id" name="almacen_id" value="{{$usuario->almacen_id}}">
                    @if($errors->has('almacen_id'))
                        <span class="error">{{ $errors->first('almacen_id') }}</span>
                    @endif
                </div>
                
            </div>

            <input type="submit" value="Enviar">
        </form>

    </div>

    <script>
        function toggleAlmacenInput() {
            var almacenInput = document.getElementById("almacen_id");
            var tipoSelect = document.getElementById("tipo");
            
            if (tipoSelect.value === "chofer") {
                almacenInput.disabled = true;
            } else {
                almacenInput.disabled = false;
            }
        }

        toggleAlmacenInput();

        document.getElementById("tipo").addEventListener("change", toggleAlmacenInput);
    </script>

</body>
</html>