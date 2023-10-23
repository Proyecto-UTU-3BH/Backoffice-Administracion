<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Va;
use Illuminate\Support\Facades\Validator;


class VaController extends Controller
{
    public function ListarVa(Request $request){
        $va = Va::all();
        
        return view('listarVa', [
            "va" => $va
        ]);
    }

    public function ListarUnVa(Request $request, $idVa){
        $va= Va::findOrFail($idVa);

        return view('modificarVa', [
            "va" => $va
        ]);
    }

    public function InsertarVa(Request $request){
        $validation = Validator::make($request->all(),[
            'ruta_id' => 'required|exists:rutas,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
            'horallegada' => 'required|date_format:H:i',
            'horasalida' => 'required|date_format:H:i',
        ],
        [
            'ruta_id.required' => 'Debes proporcionar al menos 1 ID de Ruta',
            'ruta_id.exists' => 'La Ruta ID proporcionada no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
        ]);
    
        if($validation->fails()) {
            return view("insertarVa",["errors" => $validation->errors()]);
        }

        $va = new Va();
    
        $va -> almacen_id = $request -> post ('almacen_id');
        $va -> ruta_id = $request -> post ('ruta_id');
        $va -> vehiculo_id = $request -> post ('vehiculo_id');
        $va -> fecha = $request -> post ('fecha');
        $va -> horallegada = $request -> post ('horallegada');
        $va -> horasalida = $request -> post ('horasalida');

        $va -> save();
        
    
        return view('insertarVa', [
            "mensaje" => "Registro creado correctamente"
        ]);
    }

    public function ModificarVa(Request $request, $idVa){
        $va= Va::findOrFail($idVa);

        $validation = Validator::make($request->all(),[
            'ruta_id' => 'required|exists:rutas,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha' => 'required|date',
            'horallegada' => 'required|',
            'horasalida' => 'required|',
        ],
        [
            'ruta_id.required' => 'Debes proporcionar al menos 1 ID de Ruta',
            'ruta_id.exists' => 'La Ruta ID proporcionada no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
        ]);

        if($validation->fails())
             return view("modificarVa",[
            "errors" => $validation->errors(),
            "va" => $va,
        ]);

        $va -> update($request->all());

        return redirect()->route('listarVa');

    }

    public function EliminarVa(Request $request, $idVa){
        $va= Va::findOrFail($idVa);

        $va -> delete();

        return redirect()->route('listarVa');
    }

}
