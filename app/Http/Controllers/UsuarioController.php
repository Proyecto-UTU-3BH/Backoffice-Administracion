<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $usuarios = Usuario::all();
    
        return view('listarUsuarios', [
            "usuarios" => $usuarios
        ]);
    }
    
    public function ListarUnUsuario(Request $request, $idUsuario){
        $usuario = Usuario::findOrFail($idUsuario);
    
        return view('modificarUsuario', [
            "usuario" => $usuario
        ]);
    }

    public function InsertarUsuario(Request $request){
        $validation = Validator::make($request->all(), [
            'usuario' => 'required|email|unique:usuarios',
            'ci' => 'required|string|max:8|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'primer_nombre' => 'required|alpha|min:3|max:20',
            'primer_apellido' => 'required|alpha_spaces|min:2|max:20',
            'segundo_apellido' => 'sometimes|nullable|alpha_spaces|min:2|max:20',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_de_puerta' => 'required|alpha_num|max:8',
            'tipo' => 'required|in:chofer,funcionario,admin',
            'telefono' => 'sometimes|nullable|min:9|max:12|unique:usuarios',
            'almacen_id' => 'sometimes|nullable|exists:almacenes,id',
        ],
        [
            'usuario.email' => 'Formato email',
            'usuario.unique' => 'Correo en uso',
            'ci.unique' => 'CI en uso',
            'ci.max' => 'Máximo 8 caracteres',
            'password.min' => 'Mínimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas deben ser iguales',
            'primer_nombre.alpha' => 'Solo letras',
            'primer_nombre.min' => 'Mínimo 3 caracteres',
            'primer_nombre.max' => 'Máximo 20 caracteres',
            'primer_apellido.alpha_spaces' => 'Solo letras',
            'primer_apellido.min' => 'Mínimo 2 caracteres',
            'primer_apellido.max' => 'Máximo 20 caracteres',
            'segundo_apellido.alpha_spaces' => 'Solo letras',
            'segundo_apellido.min' => 'Mínimo 2 caracteres',
            'segundo_apellido.max' => 'Máximo 20 caracteres',
            'calle.max' => 'Máximo 50 caracteres',
            'calle.alpha_spaces' => 'Solo letras',
            'numero_de_puerta.max' => 'Máximo 8 caracteres',
            'telefono.unique' => 'Este teléfono ya está en uso',
            'telefono.min' => 'Minimo 9 caracteres',
            'telefono.max' => 'Maximo 12 caracteres',
            'almacen_id.exists' => 'El ID del almacén proporcionado no existe',
        ]);
        

        if($validation->fails())
             return view("crearUsuario",["errors" => $validation->errors()]);

        $usuario = new Usuario();

        $usuario->usuario = $request->post('usuario');
        $usuario->password = Hash::make($request->post('password')); 
        $usuario->tipo = $request->post('tipo');
        $usuario->ci = $request->post('ci');
        $usuario->primer_nombre = $request->post('primer_nombre');
        $usuario->primer_apellido = $request->post('primer_apellido');
        $usuario->segundo_apellido = $request->post('segundo_apellido');
        $usuario->calle = $request->post('calle');
        $usuario->numero_de_puerta = $request->post('numero_de_puerta');
        $usuario->telefono = $request->post('telefono');
        $usuario->almacen_id = $request->post('almacen_id');

        $usuario->save();

        return view('crearUsuario', [
            "mensaje" => "Usuario creado correctamente"
        ]);
    }

    public function EliminarUsuario(Request $request, $idUsuario){
        $usuario = Usuario::findOrFail($idUsuario);
    
        $usuario->delete();
    
        return redirect()->route('listarUsuarios');
    }

    public function ModificarUsuario(Request $request, $idUsuario){
        $usuario = Usuario::findOrFail($idUsuario);

        $validation = Validator::make($request->all(),[
            'usuario' => [
                'required',
                'email',
                Rule::unique('usuarios')->ignore($usuario->id),
            ],
            'ci' => [
                'required',
                'string',
                'max:8',
                Rule::unique('usuarios', 'ci')->ignore($usuario->id),
            ],
            'telefono' => [
                'sometimes',
                'nullable',
                'min:9',
                'max:12',
                Rule::unique('usuarios', 'telefono')->ignore($usuario->id),
            ],
            'password' => 'required|string|min:8',
            'primer_nombre' => 'required|alpha|min:3|max:20',
            'primer_apellido' => 'required|alpha_spaces|min:2|max:20',
            'segundo_apellido' => 'sometimes|nullable|alpha|min:2|max:20',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_de_puerta' => 'required|alpha_num|max:8',
            'tipo' => 'required|in:chofer,funcionario,admin',
            'almacen_id' => 'sometimes|nullable|exists:almacenes,id',
        ],
        [
            'usuario.email' => 'Formato email',
            'usuario.unique' => 'Correo en uso',
            'ci.unique' => 'CI en uso',
            'ci.max' => 'Maximo 8 caracteres',
            'telefono.numeric' => 'El telefono debe ser tipo numerico',
            'telefono.min' => 'Minimo 9 caracteres',
            'telefono.max' => 'Maximo 12 caracteres',
            'telefono.unique' => 'Telefono en uso',
            'password.min' => 'Minimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas deben ser iguales',
            'primer_nombre.alpha' => 'Solo letras',
            'primer_nombre.min' => 'Minimo 3 caracteres',
            'primer_nombre.max' => 'Maximo 20 caracteres',
            'primer_apellido.alpha_spaces' => 'Solo letras',
            'primer_apellido.min' => 'Minimo 2 caracteres',
            'primer_apellido.max' => 'Maximo 20 caracteres',
            'segundo_apellido.alpha' => 'Solo letras',
            'segundo_apellido.min' => 'Minimo 2 caracteres',
            'segundo_apellido.max' => 'Maximo 20 caracteres',
            'calle.max' => 'Maximo 50 caracteres',
            'calle.alpha_spaces' => 'Solo letras',
            'numero_de_puerta.max' => 'Maximo 8 caracteres',
            'almacen_id.exists' => 'El ID de Almacen debe existir en la base de datos'
        ]);

        if($validation->fails())
             return view("modificarUsuario",[
            "errors" => $validation->errors(),
            "usuario" => $usuario,
        ]);

        $usuario->usuario = $request->post('usuario');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->tipo = $request->post('tipo');
        $usuario->ci = $request->post('ci');
        $usuario->primer_nombre = $request->post('primer_nombre');
        $usuario->primer_apellido = $request->post('primer_apellido');
        $usuario->segundo_apellido = $request->post('segundo_apellido');
        $usuario->calle = $request->post('calle');
        $usuario->numero_de_puerta = $request->post('numero_de_puerta');
        $usuario->telefono = $request->post('telefono');
        $usuario->almacen_id = $request->post('almacen_id');

        $usuario->save();

        return redirect()->route('listarUsuarios');
    }
}
