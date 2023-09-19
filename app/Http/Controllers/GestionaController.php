<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestiona;
use Illuminate\Support\Facades\Validator;

class GestionaController extends Controller
{
    public function InsertarGestiona(Request $request){
        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'IDLote' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ],
        [
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'usuario_id.exists' => 'El Usuario ID proporcionado no existe en la base de datos.',
        ]);

        if($validation->fails())
             return view("asignarLote",["errors" => $validation->errors()]);

        $gestiona = new Gestiona();
    
        $gestiona->producto_id = $request->post('producto_id');
        $gestiona->vehiculo_id = $request->post('vehiculo_id');
        $gestiona->usuario_id = $request->post('usuario_id');
        $gestiona->IDLote = $request->post('IDLote');
        $gestiona->fecha = $request->post('fecha');
    
        $gestiona->save();
    
        return view('asignarLote', [
            "mensaje" => "Asignación creada correctamente"
        ]);
    }

    public function ListarLotes() {
        $lotes = Gestiona::all();

        return view('listarLotes', [
            "lotes" => $lotes
        ]);
    }

}
