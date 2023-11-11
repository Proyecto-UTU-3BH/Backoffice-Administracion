<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class RutaController extends Controller
{
    public function ListarRutas(Request $request){
        $rutas = Ruta::all();
        
        return view('listarRutas', [
            "rutas" => $rutas
        ]);
    }
    
    public function ListarUnaRuta(Request $request, $idRuta){
        $ruta = Ruta::findOrFail($idRuta);
    
        return view('modificarRuta', [
            "ruta" => $ruta
        ]);
    }
    
    public function InsertarRuta(Request $request){
        $validation = Validator::make($request->all(),[
            'destino' => 'required|alpha_spaces',
        ],
        [
            'destino.alpha_spaces' => 'Solo letras',
        ]);

        if($validation->fails())
             return view("crearRuta",["errors" => $validation->errors()]);

        $ruta = new Ruta();
    
        $ruta->destino = $request->post('destino');
    
        $ruta->save();
    
        return view('crearRuta', [
            "mensaje" => "Ruta creada correctamente"
        ]);
    }

    public function EliminarRuta(Request $request, $idRuta){
        $ruta= Ruta::findOrFail($idRuta);

        $ruta -> delete();

        return redirect()->route('listarRutas');
    }

    public function ModificarRuta(Request $request, $idRuta){
        $ruta = Ruta::findOrFail($idRuta);
    
        $validation = Validator::make($request->all(),[
            'destino' => 'required|alpha_spaces',
        ],
        [
            'destino.alpha_spaces' => 'Solo letras',
        ]);

        if($validation->fails())
             return view("modificarRuta",[
            "errors" => $validation->errors(),
            "ruta" => $ruta
        ]);
        
        $ruta->update($request->all());
    
        return redirect()->route('listarRutas');
    }
    
}
