<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function ListarProductos(Request $request){
        $productos = Producto::all();

        return view ('listarProductos', [
            "productos" => $productos
        ]);
    }

    public function ListarUnProducto(Request $request, $idProducto){
        $producto = Producto::findOrFail($idProducto);

        return view('modificarProducto', [
            "producto" => $producto
        ]);
    }

    public function InsertarProducto(Request $request){
        $validation = Validator::make($request->all(),[
            'peso' => 'required|between:0.01,9999999.99|numeric',
            'estado' => 'required|in:en central,en transito,almacen final,en domicilio',
            'destino' => 'required|alpha_spaces',
            'tipo' => 'required|in:Carta,Sobre chico,Sobre grande,Paquete chico,Paquete mediano,Paquete grande,Otro',
            'forma_entrega' => 'required|in:pick up,reparto',
            'remitente' => 'required|min:3|max:50|alpha_spaces',
            'nombre_destinatario' => 'required|min:3|max:50|alpha_spaces',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_puerta' => 'required|string|max:8'
        ]);

        if($validation->fails())
            return response($validation->errors(),403);

        $producto=new Producto();

        $producto -> peso = $request -> post ('peso');
        $producto -> estado = $request -> post ('estado');
        $producto -> destino = $request -> post ('destino');
        $producto -> tipo = $request -> post ('tipo');
        $producto -> forma_entrega = $request -> post ('forma_entrega');
        $producto -> remitente = $request -> post ('remitente');
        $producto -> nombre_destinatario = $request -> post ('nombre_destinatario');
        $producto -> calle = $request -> post ('calle');
        $producto -> numero_puerta = $request -> post ('numero_puerta');

        $producto -> save();

        return view('crearProducto', [
            "mensaje" => "Producto creado correctamente"
        ]);
    }

    public function EliminarProducto(Request $request, $idProducto){
        $producto=Producto::findOrFail($idProducto);

        $producto -> delete();

        return redirect()->route('listarProductos');
    }

    public function ModificarProducto(Request $request, $idProducto){
        $producto=Producto::findOrFail($idProducto);

        $validation = Validator::make($request->all(),[
            'peso' => 'required|between:0.01,9999999.99|numeric',
            'estado' => 'required|in:en central,en transito,almacen final,en domicilio',
            'destino' => 'required|alpha_spaces',
            'tipo' => 'required|in:Carta,Sobre chico,Sobre grande,Paquete chico,Paquete mediano,Paquete grande,Otro',
            'forma_entrega' => 'required|in:pick up,reparto',
            'remitente' => 'required|min:3|max:50|alpha_spaces',
            'nombre_destinatario' => 'required|min:3|max:50|alpha_spaces',
            'calle' => 'required|max:50|alpha_spaces',
            'numero_puerta' => 'required|string|max:8'
        ]);

        if($validation->fails())
            return response($validation->errors(),403);

        $producto -> update($request->all());

        $producto -> save();

        return redirect()->route('listarProductos');

    }
}
