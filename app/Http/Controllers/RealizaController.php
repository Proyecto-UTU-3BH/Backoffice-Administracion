<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realiza;
use Illuminate\Support\Facades\Validator;

class RealizaController extends Controller
{
    public function ListarRealiza(Request $request){
        $realiza = Realiza::all();
        
        return view('listarRealiza', [
            "realiza" => $realiza
        ]);
    }

    public function InsertarRealiza(Request $request){
        $validation = Validator::make($request->all(),[
            'ruta_id' => 'required|exists:rutas,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
        ],
        [
            'ruta_id.required' => 'Debes proporcionar al menos 1 ID de Ruta',
            'ruta_id.exists' => 'La Ruta ID proporcionado no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
        ]);
    
        if($validation->fails()) {
            return view("insertarRealiza",["errors" => $validation->errors()]);
        }
    
        $realiza = new Realiza();
    
        $realiza->ruta_id = $request->post('ruta_id'); 
        $realiza->vehiculo_id = $request->post('vehiculo_id');
    
        $realiza->save();
        
    
        return view('insertarRealiza', [
            "mensaje" => "Registro creado correctamente"
        ]);
    }
}
