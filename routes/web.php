<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource("campeones",App\Http\Controllers\CampeoneController::class);
Route::resource("posiciones",App\Http\Controllers\PosicioneController::class)->middleware("auth");
Route::resource("estilos",App\Http\Controllers\EstiloController::class)->middleware("auth");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
