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

    public function InsertarVehiculo(Request $request){
        $vehiculo = new Vehiculo();
    
        $vehiculo->matricula = $request->post('matricula');
        $vehiculo->tipo = $request->post('tipo');
        $vehiculo->capacidad = $request->post('capacidad');
        $vehiculo->estado = $request->post('estado');
    
        $vehiculo->save();
    
        return view('crearVehiculo', [
            "mensaje" => "Vehículo creado correctamente"
        ]);
    }    

    public function EliminarVehiculo(Request $request, $idVehiculo){
        $vehiculo= Vehiculo::findOrFail($idVehiculo);

        $vehiculo -> delete();

        return redirect()->route('listarVehiculos');
    }

    public function ModificarVehiculo(Request $request, $idVehiculo){
        $vehiculo= Vehiculo::findOrFail($idVehiculo);

        $vehiculo -> update($request->all());

        $vehiculo -> save();

        return redirect()->route('listarVehiculos');

    }
}
