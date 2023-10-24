<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestiona;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class GestionaController extends Controller
{

    public function ListarLotes() {
        $lotes = Gestiona::all();

        return view('listarLotes', [
            "lotes" => $lotes
        ]);
    }

    public function ListarUnGestiona(Request $request, $idGestiona){
        $gestiona= Gestiona::findOrFail($idGestiona);

        return view('modificarGestiona', [
            "gestiona" => $gestiona
        ]);
    }

    public function InsertarGestiona(Request $request){
        $validation = Validator::make($request->all(),[
            'producto_ids' => ['required', 'numeric_ids','exists:productos,id'],
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'IDLote' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ],
        [
            'producto_ids.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_ids.numeric_ids' => 'Los IDs de producto deben ser números',
            'producto_ids.exists' => 'Uno o más IDs de producto no existen en la base de datos.',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'usuario_id.exists' => 'El Usuario ID proporcionado no existe en la base de datos.',
        ]);
    
        if($validation->fails()) {
            return view("asignarLote",["errors" => $validation->errors()]);
        }
    
        $productoIdsRaw = $request->input('producto_ids');
        $productoIds = preg_split('/\n/', str_replace("\r\n", "\n", $productoIdsRaw));
    
        foreach($productoIds as $productoId) {
            $gestiona = new Gestiona();
    
            $gestiona->producto_id = trim($productoId); 
            $gestiona->vehiculo_id = $request->post('vehiculo_id');
            $gestiona->usuario_id = $request->post('usuario_id');
            $gestiona->IDLote = $request->post('IDLote');
            $gestiona->fecha = $request->post('fecha');
    
            $gestiona->save();
        }
    
        return view('asignarLote', [
            "mensaje" => "Asignación creada correctamente"
        ]);
    }

    public function ModificarGestiona(Request $request, $idGestiona){
        $gestiona= Gestiona::findOrFail($idGestiona);

        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'IDLote' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ],
        [
            'producto_id.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'usuario_id.exists' => 'El Usuario ID proporcionado no existe en la base de datos.',
        ]);

        if($validation->fails())
             return view("modificarGestiona",[
            "errors" => $validation->errors(),
            "gestiona" => $gestiona,
        ]);

        $gestiona -> update($request->all());

        return redirect()->route('listarLotes');

    }

    public function EliminarGestiona(Request $request, $idGestiona){
        $gestiona= Gestiona::findOrFail($idGestiona);

        $gestiona -> delete();

        return redirect()->route('listarLotes');
    }

}
