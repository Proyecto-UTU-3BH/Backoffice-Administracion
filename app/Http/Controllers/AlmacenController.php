<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use Illuminate\Support\Facades\Redirect;

class AlmacenController extends Controller
{
    public function ListarAlmacenes(Request $request){
        $almacenes= Almacen::all();
        
        return view('listarAlmacenes', [
            "almacenes" => $almacenes
        ]);
    }

    public function ListarUnAlmacen(Request $request, $idAlmacen){
        $almacen= Almacen::findOrFail($idAlmacen);

        return view('modificarAlmacen', [
            "almacen" => $almacen
        ]);
    }

    public function InsertarAlmacen(Request $request){
        $almacen= new Almacen();

        $almacen -> departamento = $request -> post ('departamento');
        $almacen -> calle = $request -> post ('calle');
        $almacen -> numero_puerta = $request -> post ('numero_puerta');
        $almacen -> latitud = $request -> post ('latitud');
        $almacen -> longitud = $request -> post ('longitud');
        $almacen -> telefono = $request -> post ('telefono');
        $almacen -> capacidad = $request -> post ('capacidad');

        $almacen -> save();

        return view('crearAlmacen', [
            "mensaje" => "Almacén creado correctamente"
        ]);
    }

    public function EliminarAlmacen(Request $request, $idAlmacen){
        $almacen= Almacen::findOrFail($idAlmacen);

        $almacen -> delete();

        return redirect()->route('listarAlmacenes');
    }

    public function ModificarAlmacen(Request $request, $idAlmacen){
        $almacen= Almacen::findOrFail($idAlmacen);

        $almacen -> update($request->all());

        $almacen -> save();

        return redirect()->route('listarAlmacenes');

    }
}
