<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

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

Route::get('/listarAlmacenes', [AlmacenController::class,'ListarAlmacenes'])->name('listarAlmacenes');

Route::get('/almacenes/crearAlmacen', function () {
    return view('crearAlmacen');
})->name('crearAlmacen');

Route::get('/almacenes/modificarAlmacen/{idAlmacen}', [AlmacenController::class,'ListarUnAlmacen'])->name('modificarAlmacen');

Route::post('/almacenes/crearAlmacen', [AlmacenController::class,'InsertarAlmacen']);

Route::post('/almacenes/modificarAlmacen/{idAlmacen}', [AlmacenController::class,'ModificarAlmacen']);

Route::delete('/almacenes/eliminarAlmacen/{idAlmacen}', [AlmacenController::class,'EliminarAlmacen'])->name('eliminarAlmacen');


Route::get('/listarProductos', [ProductoController::class,'ListarProductos'])->name('listarProductos');

Route::get('/productos/crearProducto', function () {
    return view('crearProducto');
})->name('crearProducto');

Route::get('/productos/modificarProducto/{idProducto}', [ProductoController::class,'ListarUnProducto'])->name('modificarProducto');

Route::post('/productos/modificarProducto/{idProducto}', [ProductoController::class,'ModificarProducto']);

Route::post('/productos/crearProducto', [ProductoController::class,'InsertarProducto']);

Route::delete('/productos/eliminarProducto/{idProducto}', [ProductoController::class,'EliminarProducto'])->name('eliminarProducto');


Route::get('/usuarios', function () {
    return view('usuarios');
})->name('usuarios');

Route::get('/usuarios/crearUsuario', function () {
    return view('crearUsuario');
})->name('crearUsuario');

Route::get('/usuarios/modificarUsuario/{idUsuario}', [UserController::class,'ListarUnUsuario'])->name('modificarUsuario');

Route::post('/usuarios/modificarUsuario/{idUsuario}', [UserController::class,'ModificarUsuario']);

Route::post('/usuarios/crearUsuario', [UserController::class,'InsertarUsuario']);

Route::get('/usuarios/listarUsuarios', [UserController::class,'ListarUsuarios'])->name('listarUsuarios');

Route::delete('/usuarios/eliminarUsuario/{idUsuario}', [UserController::class,'EliminarUsuario'])->name('eliminarUsuario');

