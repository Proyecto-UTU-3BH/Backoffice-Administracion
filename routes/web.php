<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/almacenes', function () {
    return view('almacenes');
})->name('almacenes');

Route::get('/almacenes/crearAlmacen', function () {
    return view('crearAlmacen');
})->name('crearAlmacen');

Route::get('/almacenes/modificarAlmacen/{idAlmacen}', [AlmacenController::class,'ListarUnAlmacen'])->name('modificarAlmacen');

Route::post('/almacenes/crearAlmacen', [AlmacenController::class,'InsertarAlmacen']);

Route::post('/almacenes/modificarAlmacen/{idAlmacen}', [AlmacenController::class,'ModificarAlmacen']);

Route::get('/almacenes/listarAlmacenes', [AlmacenController::class,'ListarAlmacenes'])->name('listarAlmacenes');

Route::delete('/almacenes/eliminarAlmacen/{idAlmacen}', [AlmacenController::class,'EliminarAlmacen'])->name('eliminarAlmacen');


Route::get('/productos', function () {
    return view('productos');
})->name('productos');

Route::get('/productos/crearProducto', function () {
    return view('crearProducto');
})->name('crearProducto');

Route::get('/productos/modificarProducto/{idProducto}', [ProductoController::class,'ListarUnProducto'])->name('modificarProducto');

Route::post('/productos/modificarProducto/{idProducto}', [ProductoController::class,'ModificarProducto']);

Route::post('/productos/crearProducto', [ProductoController::class,'InsertarProducto']);

Route::get('/productos/listarProductos', [ProductoController::class,'ListarProductos'])->name('listarProductos');

Route::delete('/productos/eliminarProducto/{idProducto}', [ProductoController::class,'EliminarProducto'])->name('eliminarProducto');

