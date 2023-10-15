<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maneja;
use Illuminate\Support\Facades\Validator;

class ManejaController extends Controller
{
    public function ListarManeja(Request $request){
        $maneja = Maneja::all();
        
        return view('listarManeja', [
            "maneja" => $maneja
        ]);
    }

    public function InsertarManeja(Request $request){
        $validation = Validator::make($request->all(),[
            'usuario_id' => 'required|exists:usuarios,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
        ],
        [
            'usuario_id.required' => 'Debes proporcionar al menos 1 ID de Usuario',
            'usuario_id.exists' => 'El Usuario ID proporcionado no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
        ]);
    
        if($validation->fails()) {
            return view("insertarManeja",["errors" => $validation->errors()]);
        }
    
        $maneja = new Maneja();
    
        $maneja->usuario_id = $request->input('usuario_id'); 
        $maneja->vehiculo_id = $request->input('vehiculo_id');
    
        $maneja->save();
        
    
        return view('insertarManeja', [
            "mensaje" => "Conducción creada correctamente"
        ]);
    }

    public function EliminarManeja(Request $request, $idManeja){
        $maneja= Maneja::findOrFail($idManeja);

        $maneja -> delete();

        return redirect()->route('listarManeja');
    }
}
