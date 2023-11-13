<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parada;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ParadaController extends Controller
{
    public function vistaCrearParada(Request $request, $idRuta){

        return view('crearParada', [
            "idRuta" => $idRuta
        ]);
    }

    public function CrearParada(Request $request){
        $validation = Validator::make($request->all(),[
            'latitud' => 'required|numeric|between:-35,-30',
            'longitud' => 'required|numeric|between:-59,-53',
        ],
        [
            'latitud.between' => 'Valor entre -35 y -30',
            'longitud.between' => 'Valor entre -59 y -53',
        ]);

        if($validation->fails())
             return view("crearParada",["errors" => $validation->errors()]);

        $parada= new Parada();

        $parada -> ruta_id = $request -> post ('ruta_id');
        $parada -> latitud = $request -> post ('latitud');
        $parada -> longitud = $request -> post ('longitud');

        $parada -> save();

        return view('crearParada', [
            "mensaje" => "Parada creada correctamente",
            "idRuta" => $parada->ruta_id
        ]);
    }

    public function vistaVerParadas(Request $request, $idRuta) {

        $paradas = Parada::where('ruta_id', $idRuta)->get();

        return view('verParadas', [
            "paradas" => $paradas,
            "idRuta" => $idRuta
        ]);
    }

    public function EliminarParada(Request $request, $idParada){
        $parada= Parada::findOrFail($idParada);

        $parada -> delete();

        return redirect()->route('vistaVerParadas', ['idRuta' => $parada->ruta_id]);
    }
}
