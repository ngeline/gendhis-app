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
use App\Http\Controllers\ListPaketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;

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
    return view('welcome');
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
        /* Master Travel */
        Route::resource('master-travel', MasterTravelController::class, ['except' => [
            'update', 'destroy'
        ]]);
        Route::post('/master-travel/{master_travel}', [MasterTravelController::class, 'update'])->name('master-travel.update');
        Route::get('/master-travel/{master_travel}', [MasterTravelController::class, 'destroy'])->name('master-travel.destroy');

        /* Master Bimbel */
        Route::resource('master-bimbel', MasterBimbelController::class, ['except' => [
            'update', 'destroy'
        ]]);
        Route::post('/master-bimbel/{master_bimbel}', [MasterBimbelController::class, 'update'])->name('master-bimbel.update');
        Route::get('/master-bimbel/{master_bimbel}', [MasterBimbelController::class, 'destroy'])->name('master-bimbel.destroy');

        /* Master Jasa Foto */
        Route::resource('master-jasa-foto', MasterJasaFotoController::class, ['except' => [
            'update', 'destroy'
        ]]);
        Route::post('/master-jasa-foto/{master_jasa_foto}', [MasterJasaFotoController::class, 'update'])->name('master-jasa-foto.update');
        Route::get('/master-jasa-foto/{master_jasa_foto}', [MasterJasaFotoController::class, 'destroy'])->name('master-jasa-foto.destroy');
    });
    /* Customer */
    Route::group(['middleware' => 'CheckRole:Customer'], function(){
        /* List Paket */
        Route::get('/list-paket-travel', [ListPaketController::class, 'ListTravel'])->name('list-paket.travel');
        Route::get('/list-paket-bimbel', [ListPaketController::class, 'ListBimbel'])->name('list-paket.bimbel');
        Route::get('/list-paket-jasa-foto', [ListPaketController::class, 'ListJasaFoto'])->name('list-paket.foto');

        /* Order */
        Route::get('/form-order/{id}', [OrderController::class, 'FormOrder'])->name('form.order');
        Route::post('/form-order/{id}', [OrderController::class, 'StoreOrder'])->name('store.order');
    });

    /* Owner */
    Route::group(['middleware' => 'CheckRole:Owner'], function(){
        Route::get('/kelolaakun', [OwnerController::class, 'kelolaakun'])->name('o.kelolaakun');
        Route::post('/kelolaakun', [OwnerController::class, 'kelolaakun'])->name('o.managerSearch');
        Route::post('/store/admin', [OwnerController::class, 'register'])->name('o.user.store');
        Route::get('/kelolaakun/{id}', [OwnerController::class, 'edit'])->name('o.adminEdit');
        Route::post('/update', [OwnerController::class, 'update'])->name('o.adminUpdate');
        Route::get('/delete/{id}', [OwnerController::class, 'destroy'])->name('o.adminDelete');

    });

    /* Owner & Admin */
    Route::group(['middleware' => 'CheckRole:Owner,Admin'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});
