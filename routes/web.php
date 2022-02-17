<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VehicleController;

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

// mod seeder con datos de vehiculos
Route::get('/', [VehicleController::class, 'viewAll']);
Route::get('/admin/vehicles', [VehicleController::class, 'adminVeh']);
// Route::put('/category/{id}', [VehicleController::class, 'index']);
Route::get('/category/{id}', [VehicleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// con el middleware obligamos que, para acceder a cierto ubicacion de la pags 
// Route::get('/prestamos', [App\Http\Controllers\GestionController::class, 'prestamos'])->middleware('auth');
