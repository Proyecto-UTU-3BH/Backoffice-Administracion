<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacena;
use Illuminate\Support\Facades\Validator;

class AlmacenaController extends Controller
{

    public function ListarAlmacena(Request $request){
        $almacena = Almacena::all();
        
        return view('listarAlmacena', [
            "almacena" => $almacena
        ]);
    }

    public function ListarUnAlmacena(Request $request, $idAlmacena){
        $almacena= Almacena::findOrFail($idAlmacena);

        return view('modificarAlmacena', [
            "almacena" => $almacena
        ]);
    }

    public function InsertarAlmacena(Request $request){
        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'almacen_id' => 'required|exists:almacenes,id',
        ],
        [
            'producto_id.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
        ]);
    
        if($validation->fails()) {
            return view("almacenarProducto",["errors" => $validation->errors()]);
        }
    
        $almacena = new Almacena();
    
        $almacena->producto_id = $request->input('producto_id'); 
        $almacena->almacen_id = $request->input('almacen_id');
    
        $almacena->save();
        
    
        return view('almacenarProducto', [
            "mensaje" => "Almacenamiento creado correctamente"
        ]);
    }

    public function ModificarAlmacena(Request $request, $idAlmacena){
        $almacena= Almacena::findOrFail($idAlmacena);

        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'almacen_id' => 'required|exists:vehiculos,id',
        ],
        [
            'producto_id.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
        ]);

        if($validation->fails())
             return view("modificarAlmacena",[
            "errors" => $validation->errors(),
            "almacena" => $almacena,
        ]);

        $almacena -> update($request->all());

        return redirect()->route('listarAlmacena');

    }

    public function EliminarAlmacena(Request $request, $idAlmacena){
        $almacena= Almacena::findOrFail($idAlmacena);

        $almacena -> delete();

        return redirect()->route('listarAlmacena');
    }
}
