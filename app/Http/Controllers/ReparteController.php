<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparte;
use Illuminate\Support\Facades\Validator;

class ReparteController extends Controller
{
    public function ListarRepartos(Request $request){
        $repartos = Reparte::all();
        
        return view('listarRepartos', [
            "repartos" => $repartos
        ]);
    }

    public function ListarUnReparto(Request $request, $idReparto){
        $reparto= Reparte::findOrFail($idReparto);

        return view('modificarReparto', [
            "reparto" => $reparto
        ]);
    }

    public function InsertarReparto(Request $request){
        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fechaRealizacion' => 'required|date|before_or_equal:now',
        ],
        [
            'producto_id.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
            'fechaRealizacion.before_or_equal' => 'La fecha debe ser menor o igual a la fecha del sistema'
        ]);
    
        if($validation->fails()) {
            return view("insertarReparto",["errors" => $validation->errors()]);
        }

        $reparto = new Reparte();
    
        $reparto -> almacen_id = $request -> post ('almacen_id');
        $reparto -> producto_id = $request -> post ('producto_id');
        $reparto -> vehiculo_id = $request -> post ('vehiculo_id');
        $reparto -> fechaRealizacion = $request -> post ('fechaRealizacion');

        $reparto -> save();
        
    
        return view('insertarReparto', [
            "mensaje" => "Reparto creado correctamente"
        ]);
    }

    public function ModificarReparto(Request $request, $idReparto){
        $reparto= Reparte::findOrFail($idReparto);

        $validation = Validator::make($request->all(),[
            'producto_id' => 'required|exists:productos,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fechaRealizacion' => 'required|date|before_or_equal:now',
        ],
        [
            'producto_id.required' => 'Debes proporcionar al menos 1 ID de Producto',
            'producto_id.exists' => 'El Producto ID proporcionado no existe en la base de datos.',
            'vehiculo_id.required' => 'Debes proporcionar al menos 1 ID de Vehiculo',
            'vehiculo_id.exists' => 'El Vehiculo ID proporcionado no existe en la base de datos.',
            'almacen_id.required' => 'Debes proporcionar al menos 1 ID de Almacen',
            'almacen_id.exists' => 'El Almacen ID proporcionado no existe en la base de datos.',
            'fechaRealizacion.before_or_equal' => 'La fecha debe ser menor o igual a la fecha del sistema'
        ]);

        if($validation->fails())
             return view("modificarReparto",[
            "errors" => $validation->errors(),
            "reparto" => $reparto,
        ]);

        $reparto -> update($request->all());

        return redirect()->route('listarRepartos');

    }

    public function EliminarReparto(Request $request, $idReparto){
        $reparto= Reparte::findOrFail($idReparto);

        $reparto -> delete();

        return redirect()->route('listarRepartos');
    }

}
