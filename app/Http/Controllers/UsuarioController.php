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
        $validation = Validator::make($request->all(),[
            'usuario' => 'required|email|unique:usuarios',
            'ci' => 'required|string|max:8|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'primer_nombre' => 'required|alpha|min:3|max:20',
            'primer_apellido' => 'required|alpha|min:2|max:20',
            'segundo_apellido' => 'sometimes|nullable|alpha|min:2|max:20',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_de_puerta' => 'required|alpha_num|max:8',
            'tipo' => 'required|in:chofer,funcionario,admin',
        ]);

        if($validation->fails())
            return response($validation->errors(),403);

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
            'password' => 'required|string|min:8',
            'primer_nombre' => 'required|alpha|min:3|max:20',
            'primer_apellido' => 'required|alpha|min:2|max:20',
            'segundo_apellido' => 'sometimes|nullable|alpha|min:2|max:20',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_de_puerta' => 'required|alpha_num|max:8',
            'tipo' => 'required|in:chofer,funcionario,admin',
        ]);

        if($validation->fails())
            return response($validation->errors(),403);

        $usuario->usuario = $request->post('usuario');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->tipo = $request->post('tipo');
        $usuario->ci = $request->post('ci');
        $usuario->primer_nombre = $request->post('primer_nombre');
        $usuario->primer_apellido = $request->post('primer_apellido');
        $usuario->segundo_apellido = $request->post('segundo_apellido');
        $usuario->calle = $request->post('calle');
        $usuario->numero_de_puerta = $request->post('numero_de_puerta');

        $usuario->save();

        return redirect()->route('listarUsuarios');
    }
}
