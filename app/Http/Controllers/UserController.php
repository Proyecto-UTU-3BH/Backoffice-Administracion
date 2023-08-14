<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ListarUsuarios(Request $request){
        $usuarios = User::all();
    
        return view('listarUsuarios', [
            "usuarios" => $usuarios
        ]);
    }
    
    public function ListarUnUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        return view('modificarUsuario', [
            "usuario" => $usuario
        ]);
    }
    
    public function InsertarUsuario(Request $request){
        $usuario = new User();
    
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = Hash::make($request->post('password'));
    
        $usuario->save();
    
        return view('crearUsuario', [
            "mensaje" => "Usuario creado correctamente"
        ]);
    }
    
    public function EliminarUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        $usuario->delete();
    
        return redirect()->route('listarUsuarios');
    }
    
    public function ModificarUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        $usuario -> update($request->all());

        $usuario->save();
    
        return redirect()->route('listarUsuarios');
    }
    
}
