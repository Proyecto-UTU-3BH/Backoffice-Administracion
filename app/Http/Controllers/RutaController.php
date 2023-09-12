<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;

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
        $ruta = new Ruta();
    
        $ruta->destino = $request->post('destino');
        $ruta->recorrido = $request->post('recorrido');
    
        $ruta->save();
    
        return view('crearRuta', [
            "mensaje" => "Ruta creada correctamente"
        ]);
    }

    public function ModificarRuta(Request $request, $idRuta){
        $ruta = Ruta::findOrFail($idRuta);
    
        $ruta->update($request->all());
    
        return redirect()->route('listarRutas');
    }
    
}
