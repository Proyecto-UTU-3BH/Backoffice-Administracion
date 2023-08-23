<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $usuarios = Usuario::all();
    
        return view('listarUsuarios', [
            "usuarios" => $usuarios
        ]);
    }
    
    public function ListarUnUsuario(Request $request, $idUsuario){
        $usuario = Usuarios::findOrFail($idUsuario);
    
        return view('modificarUsuario', [
            "usuario" => $usuario
        ]);
    }
}
