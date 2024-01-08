<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AdministrarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CotizacionController;
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
Auth::routes(['verify' => true]);

// Esta ruta ya generará la vista de inicio de sesión automáticamente
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Otras rutas de autenticación
Route::view('/registro', "auth.register")->name('registro');

// Route::view('/privada', "principal")->middleware(['auth', 'verified'])->name('privada');
Route::view('/privada', "principal")->middleware('auth')->name('privada');
// Route::view('/privada2', "historial")->middleware('auth')->name('privada2');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Asigna un nombre a la ruta para facilitar su uso
Route::get('/privada2', [HistorialController::class, 'mostrarHistoriales'])->middleware('auth')->name('privada2');
Route::get('/privada3', [AdministrarController::class, 'administrarTablas'])->middleware('auth')->name('privada3');
Route::get('/privada4', [CotizacionController::class, 'create'])->middleware('auth')->name('privada4');

// Route::post('/cambiar_estado/{id}', 'HistorialController@cambiarEstado')->name('cambiar_estado');

Route::get('/register/verify/{code}', 'Auth\RegisterController@verify')->middleware('auth');

// routes/web.php

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/drivers', 'App\Http\Controllers\DriverController@verChoferes')
    ->middleware('auth')->name('drivers.index');
Route::get('/drivers/editar/{driver}', 'App\Http\Controllers\DriverController@editar')
    ->middleware('auth')->name('drivers.edit');
Route::put ('/drivers/actualizar/{driver}', 'App\Http\Controllers\DriverController@update')
    ->middleware('auth')->name('drivers.update');
Route::post('/drivers/guardar', 'App\Http\Controllers\DriverController@store')
    ->middleware('auth')->name('drivers.crear');
Route::delete('/drivers/eliminar/{driver}', 'App\Http\Controllers\DriverController@destroy')
    ->middleware('auth')->name('drivers.destroy');
Route::get('/drivers/create', 'App\Http\Controllers\DriverController@create')
    ->middleware('auth')->name('driver.create');
Route::get('/drivers/{driver}/edit', 'App\Http\Controllers\DriverController@editar')
    ->middleware('auth')->name('driver.edit');
Route::post('/drivers/guardar', 'App\Http\Controllers\DriverController@store')
    ->middleware('auth')->name('driver.store');

Route::get('/trailers', 'App\Http\Controllers\TrailerController@vertrailers')
    ->middleware('auth')->name('trailers.index');
Route::get('/trailers/editar/{trailer}', 'App\Http\Controllers\TrailerController@editar')    
    ->middleware('auth')->name('trailers.edit');
Route::put('/trailers/actualizar/{trailer}', 'App\Http\Controllers\TrailerController@update')
    ->middleware('auth')->name('trailers.update');
Route::post('/trailers/guardar', 'App\Http\Controllers\TrailerController@store')
    ->middleware('auth')->name('trailers.crear');
Route::delete('/trailers/eliminar/{trailer}', 'App\Http\Controllers\TrailerController@destroy')
    ->middleware('auth')->name('trailers.destroy');
Route::get('/trailers/create', 'App\Http\Controllers\TrailerController@create')
    ->middleware('auth')->name('trailer.create');
Route::get('/trailers/{trailer}/edit', 'App\Http\Controllers\TrailerController@editar')
    ->middleware('auth')->name('trailer.edit');
Route::post('/trailers/guardar', 'App\Http\Controllers\TrailerController@store')
    ->middleware('auth')->name('trailer.store');

Route::get('/customers', 'App\Http\Controllers\CustomerController@verclientes')
    ->middleware('auth')->name('customers.index');
Route::get('/customers/editar/{customer}', 'App\Http\Controllers\CustomerController@editar')
    ->middleware('auth')->name('customers.edit');
Route::put('/customers/actualizar/{customer}', 'App\Http\Controllers\CustomerController@update')
    ->middleware('auth')->name('customers.update');
Route::post('/customers/guardar', 'App\Http\Controllers\CustomerController@store')
    ->middleware('auth')->name('customers.crear');
Route::delete('/customers/eliminar/{customer}', 'App\Http\Controllers\CustomerController@destroy')
    ->middleware('auth')->name('customers.destroy');
Route::get('/customers/create', 'App\Http\Controllers\CustomerController@create')
    ->middleware('auth')->name('customer.create');
Route::get('/customers/{customer}/edit', 'App\Http\Controllers\CustomerController@editar')
    ->middleware('auth')->name('customer.edit');
Route::post('/customers/guardar', 'App\Http\Controllers\CustomerController@store')
    ->middleware('auth')->name('customer.store');


Route::post('/cotizaciones/guardar', 'App\Http\Controllers\CotizacionController@store')
    ->middleware('auth')->name('cotizaciones.crear');
Route::post('/cotizaciones/guardar', 'App\Http\Controllers\CotizacionController@store')    
    ->middleware('auth')->name('cotizacion.store');
Route::get('/cotizaciones/create', 'App\Http\Controllers\CotizacionController@create') 
    ->middleware('auth')->name('cotizacion.create');
Route::post('/cotizaciones/ver', 'App\Http\Controllers\CotizacionController@obtenerCosto') 
    ->middleware('auth')->name('cotizacion.ver');
Route::get('/cotizaciones/verPDF', 'App\Http\Controllers\CotizacionController@pdf')
    ->middleware('auth')->name('cotizacion.pdf');    
Route::get('/cotizaciones/verPDF/{cotizacion}', 'App\Http\Controllers\CotizacionController@verCoti')
    ->middleware('auth')->name('cotizacionpdf.pdf');

Route::get('/historial/ver-pdf/{id}', 'App\Http\Controllers\CotizacionController@verPdf')->middleware('auth')->name('ver_pdf');