<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\CostosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoInventarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\InventarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

// Route::get('/','AuthController@showLoginForm');

Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/users', [AuthController::class, 'login']);










Route::post('/activo', [ActivoController::class, 'store']);
Route::get('/activo', [ActivoController::class, 'index']);
Route::put('/activo', [ActivoController::class, 'update']);
Route::get('/activo-desactivar', [ActivoController::class, 'desactivar']);


Route::get('/costos', [CostosController::class, 'index']);
Route::post('/costos', [CostosController::class, 'store']);
Route::put('/costos', [CostosController::class, 'update']);
Route::get('/costos-desactivar', [CostosController::class, 'desactivar']);

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::put('/productos', [ProductoController::class, 'update']);
Route::get('/productos-desactivar', [ProductoController::class, 'desactivar']);

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::post('/categoria', [CategoriaController::class, 'store']);
Route::put('/categoria', [CategoriaController::class, 'update']);
Route::get('/categoria-desactivar', [CategoriaController::class, 'desactivar']);

Route::get('/roles', [RolController::class, 'index']);
Route::post('/roles', [RolController::class, 'store']);
Route::put('/roles', [RolController::class, 'update']);
Route::get('/roles-desactivar', [RolController::class, 'desactivar']);

Route::get('/tipo-inventario', [TipoInventarioController::class, 'index']);
Route::post('/tipo-inventario', [TipoInventarioController::class, 'store']);
Route::put('/tipo-inventario', [TipoInventarioController::class, 'update']);
Route::get('/tipo-inventario-desactivar', [TipoInventarioController::class, 'desactivar']);

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::put('/usuario', [UsuarioController::class, 'update']);
Route::get('/usuario-desactivar', [UsuarioController::class, 'desactivar']);


Route::get('/almacen', [AlmacenController::class, 'index']);
Route::post('/almacen', [AlmacenController::class, 'store']);
Route::put('/almacen', [AlmacenController::class, 'update']);
Route::get('/almacen-desactivar', [AlmacenController::class, 'desactivar']);

Route::get('/proveedor', [ProveedorController::class, 'index']);
Route::post('/proveedor', [ProveedorController::class, 'store']);
Route::put('/proveedor', [ProveedorController::class, 'update']);
Route::get('/proveedor-desactivar', [ProveedorController::class, 'desactivar']);

Route::get('/inventario', [InventarioController::class, 'index']);
Route::post('/inventario', [InventarioController::class, 'store']);
Route::put('/inventario', [InventarioController::class, 'update']);
Route::get('/inventario-desactivar', [InventarioController::class, 'desactivar']);



// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::get('/main', [AuthController::class, 'showLoginForm']);

Route::get('/main', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/production-manager', function () {
    return view('production-manager');
});

Route::get('/production-assistant', function () {
    return view('production-assistant');
});

Route::get('/secretary', function () {
    return view('secretary');
});

Route::get('/admin/categoria', function () {
    return view('views-admin.categoria');
});


Route::get('/admin/almacen', function () {
    return view('views-admin.almacen');
});

Route::get('/admin/activos', function () {
    return view('views-admin.activos');
});

Route::get('/admin/costos', function () {
    return view('views-admin.costos');
});

Route::get('/admin/productos', function () {
    return view('views-admin.productos');
});

Route::get('/admin/categoria', function () {
    return view('views-admin.categoria');
});

Route::get('/admin/roles', function () {
    return view('views-admin.roles');
});

Route::get('/admin/tipo-inventario', function () {
    return view('views-admin.tipo-inventario');
});

Route::get('/admin/usuario', function () {
    return view('views-admin.usuario');
});

Route::get('/admin/almacen', function () {
    return view('views-admin.almacen');
});

Route::get('/admin/proveedor', function () {
    return view('views-admin.proveedor');
});

Route::get('/admin/inventarios', function () {
    return view('views-admin.inventarios');
});


Route::get('/admin/insumos', function () {
    return view('views-admin.insumos');
});








