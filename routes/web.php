<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterTravelController;
use App\Http\Controllers\MasterBimbelController;
use App\Http\Controllers\MasterJasaFotoController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Login */
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

/* Register */
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.login');

/* Logout */
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/* Middleware && Auth */
Route::group(['middleware' => 'auth'], function(){
    /* Admin */
    Route::group(['middleware' => 'CheckRole:Admin'], function(){
        Route::resource('master-travel', MasterTravelController::class, ['except' => [
            'update', 'destroy'
        ]]);
        Route::post('/master-travel/{master_travel}', [MasterTravelController::class, 'update'])->name('master-travel.update');
        Route::get('/master-travel/{master_travel}', [MasterTravelController::class, 'destroy'])->name('master-travel.destroy');

        Route::resource('master-bimbel', MasterBimbelController::class);
        Route::resource('master-jasa-foto', MasterJasaFotoController::class);
    });
    /* Customer */
    Route::group(['middleware' => 'CheckRole:Customer'], function(){

    });
    /* Owner */
    Route::group(['middleware' => 'CheckRole:Owner'], function(){

    });

    /* Owner & Admin */
    Route::group(['middleware' => 'CheckRole:Owner,Admin'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
