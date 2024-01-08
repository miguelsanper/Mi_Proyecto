<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/drivers', 'App\Http\Controllers\DriverController@index');
Route::post('/drivers', 'App\Http\Controllers\DriverController@store');
Route::get('/drivers/{driver}', 'App\Http\Controllers\DriverController@show');
Route::put('/drivers/{driver}', 'App\Http\Controllers\DriverController@update');
Route::delete('/drivers/{driver}', 'App\Http\Controllers\DriverController@destroy');
