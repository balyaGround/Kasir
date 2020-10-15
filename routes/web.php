<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');

    Route::resource('master/produk/receipt',\App\Http\Controllers\ProdukJualController::class);
    Route::get('master/produk/receipt/dataTable/{produk_id}',[\App\Http\Controllers\ProdukJualController::class,'dataTable']);


    Route::resource('master/bahan', \App\Http\Controllers\Master\BahanController::class);
    Route::resource('master/produk',\App\Http\Controllers\Master\ProdukController::class);
    Route::resource('master/toko',\App\Http\Controllers\Master\TokoController::class);
    Route::resource('master/role',\App\Http\Controllers\User\RoleController::class);

    Route::get('user-management/users/password', [\App\Http\Controllers\User\UserController::class, 'passwordView'])->name('password.index');
    Route::post('user-management/users/passwordprocess', [\App\Http\Controllers\User\UserController::class, 'passwordProcess'])->name('password.process');
    Route::resource('user-management/role',\App\Http\Controllers\User\RoleController::class);
    Route::resource('user-management/users',\App\Http\Controllers\User\UserController::class);

    Route::get('report-management/report',[\App\Http\Controllers\Laporan\LaporanController::class,'index'])->name('laporan.index');

//    Route::post('master/produk/receipt/post',[\App\Http\Controllers\ProdukJualController::class,'insertBahan'])->name('receipt.insert');

});


Route::get('login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::get('logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logout');
Route::post('login/process',[\App\Http\Controllers\LoginController::class,'loginProcess'])->name('login.process');


