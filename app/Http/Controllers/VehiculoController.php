<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Redirect;

class VehiculoController extends Controller
{
    public function ListarVehiculos(Request $request){
        $vehiculos = Vehiculo::all();
        
        return view('listarVehiculos', [
            "vehiculos" => $vehiculos
        ]);
    }
    
    public function ListarUnVehiculo(Request $request, $idVehiculo){
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
    
        return view('modificarVehiculo', [
            "vehiculo" => $vehiculo
        ]);
    }

    
    public function ModificarVehiculo(Request $request, $idVehiculo){
        $vehiculo= Vehiculo::findOrFail($idVehiculo);

        $vehiculo -> update($request->all());

        $vehiculo -> save();

        return redirect()->route('listarVehiculos');

    }
}
