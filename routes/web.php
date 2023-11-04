<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\GestionaController;
use App\Http\Controllers\AlmacenaController;
use App\Http\Controllers\ManejaController;
use App\Http\Controllers\VaController;
use App\Http\Controllers\ReparteController;
use App\Http\Controllers\ParadaController;
use App\Http\Controllers\RealizaController;

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
    
    

    Route::get('/listarAdmins', [UserController::class,'ListarAdmins'])->name('listarAdmins');
    
    Route::get('/admins/crearAdmin', function () {
        return view('crearAdmin');
    })->name('crearAdmin');
    
    Route::get('/admins/modificarAdmin/{idAdmin}', [UserController::class,'ListarUnAdmin'])->name('modificarAdmin');
    
    Route::post('/admins/modificarAdmin/{idAdmin}', [UserController::class,'ModificarAdmin']);
    
    Route::post('/admins/crearAdmin', [UserController::class,'InsertarAdmin']);
    
    Route::delete('/admins/eliminarAdmin/{idAdmin}', [UserController::class,'EliminarAdmin'])->name('eliminarAdmin');



    Route::get('/listarUsuarios', [UsuarioController::class,'ListarUsuarios'])->name('listarUsuarios');

    Route::get('/usuarios/crearUsuario', function () {
        return view('crearUsuario');
    })->name('crearUsuario');

    Route::get('/usuarios/modificarUsuario/{idUsuario}', [UsuarioController::class,'ListarUnUsuario'])->name('modificarUsuario');

    Route::post('/usuarios/modificarUsuario/{idUsuario}', [UsuarioController::class,'ModificarUsuario']);

    Route::post('/usuarios/crearUsuario', [UsuarioController::class,'InsertarUsuario']);

    Route::delete('/usuarios/eliminarUsuario/{idUsuario}', [UsuarioController::class,'EliminarUsuario'])->name('eliminarUsuario');



    Route::get('/listarVehiculos', [VehiculoController::class,'ListarVehiculos'])->name('listarVehiculos');

    Route::get('/vehiculos/crearVehiculo', function () {
        return view('crearVehiculo');
    })->name('crearVehiculo');

    Route::get('/vehiculos/modificarVehiculo/{idVehiculo}', [VehiculoController::class,'ListarUnVehiculo'])->name('modificarVehiculo');

    Route::post('/vehiculos/modificarVehiculo/{idVehiculo}', [VehiculoController::class,'ModificarVehiculo']);

    Route::post('/vehiculos/crearVehiculo', [VehiculoController::class,'InsertarVehiculo']);

    Route::delete('/vehiculos/eliminarVehiculo/{idVehiculo}', [VehiculoController::class,'EliminarVehiculo'])->name('eliminarVehiculo');


    Route::get('/listarRutas', [RutaController::class,'ListarRutas'])->name('listarRutas');

    Route::get('/rutas/crearRuta', function () {
        return view('crearRuta');
    })->name('crearRuta');

    Route::get('/rutas/modificarRuta/{idRuta}', [RutaController::class,'ListarUnaRuta'])->name('modificarRuta');

    Route::post('/rutas/modificarRuta/{idRuta}', [RutaController::class,'ModificarRuta']);

    Route::post('/rutas/crearRuta', [RutaController::class,'InsertarRuta']);

    Route::delete('/rutas/eliminarRuta/{idRuta}', [RutaController::class,'EliminarRuta'])->name('eliminarRuta');


    Route::get('/rutas/crearParada/{idRuta}', [ParadaController::class,'vistaCrearParada'])->name('vistaCrearParada');

    Route::get('/rutas/verParadas/{idRuta}', [ParadaController::class,'vistaVerParadas'])->name('vistaVerParadas');

    Route::post('/rutas/crearParada', [ParadaController::class,'CrearParada']);


    Route::get('/listarLotes', [GestionaController::class,'ListarLotes'])->name('listarLotes');

    Route::get('/gestiona/asignarLote', function () {
        return view('asignarLote');
    })->name('asignarLote');

    Route::get('/gestiona/modificarLote/{idGestiona}', [GestionaController::class,'ListarUnGestiona'])->name('modificarGestiona');

    Route::post('/gestiona/modificarLote/{idGestiona}', [GestionaController::class,'ModificarGestiona']);

    Route::post('/gestiona/asignarLote', [GestionaController::class,'InsertarGestiona']);

    Route::delete('/gestiona/eliminarGestiona/{idGestiona}', [GestionaController::class,'EliminarGestiona'])->name('eliminarGestiona');

    Route::get('/gestiona/buscarLotesChofer', function () {
        return view('buscarLotesChofer');
    })->name('buscarLotesChofer');

    Route::get('/gestiona/verLotes', [GestionaController::class,'lotesAsignadosAlChofer'])->name('verLotesChofer');

    Route::get('/gestiona/verLotes/verMapa', [GestionaController::class,'mostrarCoordenadasDestinos'])->name('mostrarCoordenadasDestinos');

    Route::get('/gestiona/verLotes/verRutaEnMapa', function () {
        return view('verRutaEnMapa');
    })->name('verRutaEnMapa');


    Route::get('/listarAlmacena', [AlmacenaController::class,'ListarAlmacena'])->name('listarAlmacena');

    Route::get('/almacena/almacenar', function () {
        return view('almacenarProducto');
    })->name('almacenarProducto');

    Route::get('/almacena/modificarAlmacena/{idAlmacena}', [AlmacenaController::class,'ListarUnAlmacena'])->name('modificarAlmacena');

    Route::post('/almacena/modificarAlmacena/{idAlmacena}', [AlmacenaController::class,'ModificarAlmacena']);

    Route::post('/almacena/almacenar', [AlmacenaController::class,'InsertarAlmacena']);

    Route::delete('/almacena/eliminarAlmacena/{idAlmacena}', [AlmacenaController::class,'EliminarAlmacena'])->name('eliminarAlmacena');


    Route::get('/listarManeja', [ManejaController::class,'ListarManeja'])->name('listarManeja');

    Route::get('/maneja/manejar', function () {
        return view('insertarManeja');
    })->name('insertarManeja');

    Route::get('/maneja/modificarManeja/{idManeja}', [ManejaController::class,'ListarUnManeja'])->name('modificarManeja');

    Route::post('/maneja/modificarManeja/{idManeja}', [ManejaController::class,'ModificarManeja']);

    Route::post('/maneja/manejar', [ManejaController::class,'InsertarManeja']);

    Route::delete('/maneja/eliminarManeja/{idManeja}', [ManejaController::class,'EliminarManeja'])->name('eliminarManeja');


    Route::get('/listarVa', [VaController::class,'ListarVa'])->name('listarVa');

    Route::get('/va/insertarRegistro', function () {
        return view('insertarVa');
    })->name('insertarVa');

    Route::get('/va/modificarVa/{idVa}', [VaController::class,'ListarUnVa'])->name('modificarVa');

    Route::post('/va/modificarVa/{idVa}', [VaController::class,'ModificarVa']);

    Route::post('/va/insertarRegistro', [VaController::class,'InsertarVa']);

    Route::delete('/va/eliminarVa/{idVa}', [VaController::class,'EliminarVa'])->name('eliminarVa');


    Route::get('/listarRepartos', [ReparteController::class,'ListarRepartos'])->name('listarRepartos');

    Route::get('/reparto/insertarReparto', function () {
        return view('insertarReparto');
    })->name('insertarReparto');

    Route::post('/reparto/insertarReparto', [ReparteController::class,'InsertarReparto']);

    Route::get('/reparto/modificarReparto/{idReparto}', [ReparteController::class,'ListarUnReparto'])->name('modificarReparto');

    Route::post('/reparto/modificarReparto/{idReparto}', [ReparteController::class,'ModificarReparto']);

    Route::delete('/reparto/eliminarReparto/{idReparto}', [ReparteController::class,'EliminarReparto'])->name('eliminarReparto');


    Route::get('/listarRealiza', [RealizaController::class,'ListarRealiza'])->name('listarRealiza');
    
});



