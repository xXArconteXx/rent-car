<?php

use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VehicleController;
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

// mod seeder con datos de vehiculos
Route::get('/', [VehicleController::class, 'viewAll']);
Route::get('/category/{id}', [VehicleController::class, 'index']);
Route::get('/content-layout/show-vehicle/{vehicle}', [VehicleController::class, 'show']);

Route::group(['middleware' => ['role:client']], function () {
    Route::get('/content-layout/form', [RentController::class, 'create']);
}

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    //accebility routes for admins
    Route::get('/admin/index', [VehicleController::class, 'adminVeh2']);
    Route::get('/admin/vehicles/list', [VehicleController::class, 'adminVeh']);
    Route::get('/admin/users/list', [UserController::class, 'adminUser']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// con el middleware obligamos que, para acceder a cierto ubicacion de la pags
// Route::get('/prestamos', [App\Http\Controllers\GestionController::class, 'prestamos'])->middleware('auth');
