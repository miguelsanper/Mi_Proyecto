<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\HistorialController;
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

// Elimina estas líneas si ya estás utilizando Auth::routes();
// Auth::routes();

// Ruta para cargar automáticamente la vista de inicio de sesión al iniciar el proyecto
// Utiliza Auth::routes() para generar las rutas de autenticación
Auth::routes();

// Esta ruta ya generará la vista de inicio de sesión automáticamente
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');


// Otras rutas de autenticación
Route::view('/registro', "register")->name('registro');
Route::view('/privada', "historial")->middleware('auth')->name('privada');

Route::post('/validar-registro', [Logincontroller::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [Logincontroller::class, 'login'])->name('inicia-sesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Asigna un nombre a la ruta para facilitar su uso
Route::get('/historial', [HistorialController::class, 'mostrarHistoriales'])->name('historial');