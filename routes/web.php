<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', 'Auth\LoginController@login')->name('login');









