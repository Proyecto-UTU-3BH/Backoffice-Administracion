<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\UsuarioController;

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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    
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
    
    
    Route::get('/listarAdmins', [UserController::class,'ListarUsuarios'])->name('listarAdmins');
    
    Route::get('/admins/crearAdmin', function () {
        return view('crearAdmin');
    })->name('crearAdmin');
    
    Route::get('/admins/modificarAdmin/{idAdmin}', [UserController::class,'ListarUnUsuario'])->name('modificarAdmin');
    
    Route::post('/admins/modificarAdmin/{idAdmin}', [UserController::class,'ModificarUsuario']);
    
    Route::post('/admins/crearAdmin', [UserController::class,'InsertarUsuario']);
    
    Route::delete('/admins/eliminarAdmin/{idAdmin}', [UserController::class,'EliminarUsuario'])->name('eliminarAdmin');


    Route::get('/listarUsuarios', [UsuarioController::class,'ListarUsuarios'])->name('listarUsuarios');

    Route::get('/usuarios/crearUsuario', function () {
        return view('crearUsuario');
    })->name('crearUsuario');

    Route::post('/usuarios/crearUsuario', [UsuarioController::class,'InsertarUsuario']);


    Route::get('/listarVehiculos', [VehiculoController::class,'ListarVehiculos'])->name('listarVehiculos');

    Route::get('/vehiculos/crearVehiculo', function () {
        return view('crearVehiculo');
    })->name('crearVehiculo');

    Route::get('/vehiculos/modificarVehiculo/{idVehiculo}', [VehiculoController::class,'ListarUnVehiculo'])->name('modificarVehiculo');

    Route::post('/vehiculos/modificarVehiculo/{idVehiculo}', [VehiculoController::class,'ModificarVehiculo']);

    Route::post('/vehiculos/crearVehiculo', [VehiculoController::class,'InsertarVehiculo']);

    Route::delete('/vehiculos/eliminarVehiculo/{idVehiculo}', [VehiculoController::class,'EliminarVehiculo'])->name('eliminarVehiculo');
    
});



