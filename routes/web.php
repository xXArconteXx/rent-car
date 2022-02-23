<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\PenaltyController;

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
Route::get('/content-layout/form', [RentController::class, 'create']);

Auth::routes();

Route::group(['middleware' => ['role:client']], function () {
    Route::post('/content-layout/form', [RentController::class, 'store'])->name('form-rent');
    Route::get('/content-layout/acknowledge', [RentController::class, 'index'])->name('acknowledge');
    Route::get('/content-layout/my-list-rents', [RentController::class, 'myRents'])->name('my-rents');
});

//accebility routes for admins
Route::group(['middleware' => ['role:admin']], function () {
    // vehicles
    Route::get('/admin/vehicles/list', [VehicleController::class, 'adminVeh'])->name('vehicle.list');
    Route::get('/admin/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/admin/vehicles/create', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/admin/vehicles/edit/{vehicle}', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/admin/vehicles/edit/{vehicle}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('/admin/vehicles/delete/{vehicle}', [VehicleController::class, 'destroyer'])->name('vehicle.destroy');

    // users
    Route::get('/admin/users/list', [UserController::class, 'adminUser'])->name('user.list');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/admin/users/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/admin/users/edit/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroyer'])->name('user.destroy');
    // rentings
    Route::get('/admin/rentings/list', [RentController::class, 'adminRent'])->name('rent.list');
    Route::get('/admin/rentings/edit/{rent}', [RentController::class, 'edit'])->name('rent.edit');
    Route::post('/admin/rentings/edit/{rent}', [RentController::class, 'update'])->name('rent.update');
    Route::delete('/admin/rentings/delete/{rent}', [RentController::class, 'destroyer'])->name('rent.destroy');

    // penalties
    Route::get('/admin/penalties/list', [PenaltyController::class, 'show'])->name('penalty.list');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
