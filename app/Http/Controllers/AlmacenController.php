<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

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
        $validation = Validator::make($request->all(),[
            'latitud' => 'required|numeric|between:-35,-30',
            'longitud' => 'required|numeric|between:-59,-53',
            'telefono' => 'required|numeric|unique:almacenes',
            'capacidad' => 'required|numeric|min:1',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_puerta' => 'required|alpha_num|max:8',
            'departamento' => 'required|alpha_spaces',
        ],
        [
            'latitud.between' => 'Valor entre -35 y -30',
            'longitud.between' => 'Valor entre -59 y -53',
            'calle.max' => 'Maximo 50 caracteres',
            'numero_puerta.max' => 'Maximo 8 caracteres',
            'departamento.alpha_spaces' => 'Solo letras',
            'telefono.unique' => 'Telefono en uso',
            'capacidad.min' => 'Valores mayores a 0'
        ]);

        if($validation->fails())
             return view("crearAlmacen",["errors" => $validation->errors()]);

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

        $validation = Validator::make($request->all(),[
            'latitud' => 'required|numeric|between:-35,-30',
            'longitud' => 'required|numeric|between:-59,-53',
            'telefono' => [
                'required',
                'numeric',
                Rule::unique('almacenes', 'telefono')->ignore($almacen->id),
            ],
            'capacidad' => 'required|numeric|min:1',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_puerta' => 'required|alpha_num|max:8',
            'departamento' => 'required|alpha_spaces',
        ],
        [
            'latitud.between' => 'Valor entre -35 y -30',
            'longitud.between' => 'Valor entre -59 y -53',
            'calle.max' => 'Maximo 50 caracteres',
            'numero_puerta.max' => 'Maximo 8 caracteres',
            'departamento.alpha_spaces' => 'Solo letras',
            'telefono.unique' => 'Telefono en uso',
            'capacidad.min' => 'Valores mayores a 0'
        ]);

        if($validation->fails())
             return view("modificarAlmacen",[
            "errors" => $validation->errors(),
            "almacen" => $almacen,
        ]);

        $almacen -> update($request->all());

        $almacen -> save();

        return redirect()->route('listarAlmacenes');

    }
}
