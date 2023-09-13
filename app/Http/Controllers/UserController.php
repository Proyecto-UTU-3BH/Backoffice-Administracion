<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ListarUsuarios(Request $request){
        $usuarios = User::all();
    
        return view('listarAdmins', [
            "usuarios" => $usuarios
        ]);
    }
    
    public function ListarUnUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        return view('modificarAdmin', [
            "usuario" => $usuario
        ]);
    }
    
    public function InsertarUsuario(Request $request){
        $usuario = new User();
    
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = Hash::make($request->post('password'));
    
        $usuario->save();
    
        return view('crearAdmin', [
            "mensaje" => "Admin creado correctamente"
        ]);
    }
    
    public function EliminarUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        $usuario->delete();
    
        return redirect()->route('listarAdmins');
    }
    
    public function ModificarUsuario(Request $request, $idUsuario){
        $usuario = User::findOrFail($idUsuario);
    
        $usuario->name = $request->post('name');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->email = $request->post('email');

        $usuario->save();
    
        return redirect()->route('listarAdmins');
    }
    
}
