<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [CategoryController::class, 'index']);

Route::get('/login', function () {
    return view('layouts/login/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// con el middleware obligamos que, para acceder a cierto ubicacion de la pags 
// Route::get('/prestamos', [App\Http\Controllers\GestionController::class, 'prestamos'])->middleware('auth');
