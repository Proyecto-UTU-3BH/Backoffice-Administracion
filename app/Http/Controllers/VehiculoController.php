<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $validation = Validator::make($request->all(), [
            'matricula' => 'required|max:7|unique:vehiculos',
            'tipo' => 'required|in:flete,reparto',
            'capacidad' => 'required|numeric|between:0,99999.99',
            'estado' => 'in:en almacen,en transito',
        ], [
            'matricula.max' => 'Máximo 7 caracteres',
            'tipo.in' => 'El tipo debe ser "flete" o "reparto"',
            'capacidad.between' => 'La capacidad debe estar entre 0 y 99999.99',
            'estado.in' => 'El estado debe ser "en almacen" o "en transito"',
        ]);
    
        if ($validation->fails()) {
            return view("crearVehiculo", ["errors" => $validation->errors()]);
        }
    
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
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
    
        $validation = Validator::make($request->all(), [
            'matricula' => [
                'required',
                'max:7',
                Rule::unique('vehiculos', 'matricula')->ignore($vehiculo->id),
            ],
            'tipo' => 'required|in:flete,reparto',
            'capacidad' => 'required|numeric|between:0,99999.99',
            'estado' => 'required|in:en almacen,en transito',
        ], [
            'matricula.required' => 'La matrícula es requerida',
            'matricula.max' => 'Máximo 7 caracteres',
            'matricula.unique' => 'La matrícula ya está en uso',
            'tipo.required' => 'El tipo es requerido',
            'tipo.in' => 'El tipo debe ser "flete" o "reparto"',
            'capacidad.required' => 'La capacidad es requerida',
            'capacidad.numeric' => 'La capacidad debe ser un número',
            'capacidad.between' => 'La capacidad debe estar entre 0 y 99999.99',
            'estado.required' => 'El estado es requerido',
            'estado.in' => 'El estado debe ser "en almacen" o "en transito"',
        ]);
    
        if ($validation->fails()) {
            return view("modificarVehiculo", [
                "errors" => $validation->errors(),
                "vehiculo" => $vehiculo,
            ]);
        }
    
        $vehiculo->update($request->all());
    
        return redirect()->route('listarVehiculos');
    }
}
