<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;

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
        $producto=new Producto();

        $producto -> peso = $request -> post ('peso');
        $producto -> estado = $request -> post ('estado');
        $producto -> destino = $request -> post ('destino');
        $producto -> tipo = $request -> post ('tipo');

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

        $producto -> update($request->all());

        $producto -> save();

        return redirect()->route('listarProductos');

    }
}
