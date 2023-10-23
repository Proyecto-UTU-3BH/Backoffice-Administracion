<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function ListarAdmins(Request $request){
        $admins = User::all();
    
        return view('listarAdmins', [
            "admins" => $admins
        ]);
    }
    
    public function ListarUnAdmin(Request $request, $idAdmin){
        $admin = User::findOrFail($idAdmin);
    
        return view('modificarAdmin', [
            "admin" => $admin
        ]);
    }
    
    public function InsertarAdmin(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ],
        [
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre no puede tener más de 20 caracteres',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida',
            'email.unique' => 'Este correo electrónico ya está en uso',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ]);
    
        if($validation->fails()) {
            return view("crearAdmin", ["errors" => $validation->errors()]);
        }
    
        $admin = new User();
    
        $admin->name = $request->post('name');
        $admin->email = $request->post('email');
        $admin->password = Hash::make($request->post('password'));
    
        $admin->save();
    
        return view('crearAdmin', [
            "mensaje" => "Admin creado correctamente"
        ]);
    }
    
    public function EliminarAdmin(Request $request, $idAdmin){
        $admin = User::findOrFail($idAdmin);
    
        $admin->delete();
    
        return redirect()->route('listarAdmins');
    }
    
    public function ModificarAdmin(Request $request, $idAdmin){
        $admin = User::findOrFail($idAdmin);
    
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($admin->id),
            ],
            'password' => 'required|string|min:8',
        ],
        [
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre no puede tener más de 20 caracteres',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida',
            'email.unique' => 'Este correo electrónico ya está en uso',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ]);
    
        if($validation->fails()) {
            return view("modificarAdmin", [
                "errors" => $validation->errors(),
                "admin" => $admin,
            ]);
        }
    
        $admin->name = $request->post('name');
        $admin->password = Hash::make($request->post('password'));
        $admin->email = $request->post('email');
    
        $admin->save();
    
        return redirect()->route('listarAdmins');
    }
    
    
    
}
