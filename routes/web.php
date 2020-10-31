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

//   dashboard
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');
    Route::get('filterProduk/{produkname}', [\App\Http\Controllers\DashboardController::class, 'filterProduk'])->name('filter.produk');
    Route::get('filterStock/{bahanname}', [\App\Http\Controllers\DashboardController::class, 'filterStok'])->name('filter.stok');
    Route::post('bayar', [\App\Http\Controllers\DashboardController::class, 'bayar'])->name('bayar');
    Route::get('print/invoice/{noinvoice}', [\App\Http\Controllers\PrintController::class, 'printInvoice'])->name('print.invoice');
    Route::get('invoice/dataTable', [\App\Http\Controllers\DashboardController::class, 'invoiceList'])->name('invoice.dataTable');

//    barang
    Route::get('barang', [\App\Http\Controllers\BarangController::class, 'index'])->name('barang');
    Route::get('barang/bahan-selection', [\App\Http\Controllers\BarangController::class, 'bahanSelection'])->name('barang.bahan.selection');

    Route::get('master/bahan/logs',[\App\Http\Controllers\BarangController::class,'stokLogs'])->name('bahan.logs');
    Route::get('master/bahan/dataTable', [\App\Http\Controllers\Master\BahanController::class, 'dataTable'])->name('bahan.dataTable');
    Route::resource('master/bahan', \App\Http\Controllers\Master\BahanController::class);

    Route::resource('master/produk/receipt', \App\Http\Controllers\ProdukJualController::class);
    Route::get('master/produk/receipt/dataTable/{produk_id}', [\App\Http\Controllers\ProdukJualController::class, 'dataTable']);
    Route::resource('master/produk', \App\Http\Controllers\Master\ProdukController::class);

//    laporan
    Route::post('report-management/pembukuan/update',[\App\Http\Controllers\Laporan\PembukuanController::class,'updatePembukuan'])->name('pembukuan.update');
    Route::get('report-management/pembukuan/generate',[\App\Http\Controllers\Laporan\PembukuanController::class,'generatePembukuan'])->name('pembukuan.generate');
    Route::get('report-management/pembukuan/check',[\App\Http\Controllers\Laporan\PembukuanController::class,'checkPembukuan'])->name('pembukuan.check');
    Route::get('report-management/pembukuan/tfoot',[\App\Http\Controllers\Laporan\PembukuanController::class,'tfootPembukuan'])->name('pembukuan.tfoot');
    Route::get('report-management/pembukuan/DataTable',[\App\Http\Controllers\Laporan\PembukuanController::class,'pembukuanDatatable'])->name('pembukuan.dataTable');
    Route::get('report-management/chartTahunan',[\App\Http\Controllers\Laporan\LaporanController::class,'chartTahunan'])->name('report.chartTahunan');
    Route::get('report-management', [\App\Http\Controllers\Laporan\LaporanController::class, 'hariIni'])->name('report.today');
    Route::get('report-management/laporan', [\App\Http\Controllers\Laporan\LaporanController::class, 'index'])->name('laporan.index');

//    settings
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings');

    Route::get('master/toko/dataTable', [\App\Http\Controllers\Master\TokoController::class, 'dataTable'])->name('toko.dataTable');
    Route::resource('master/toko', \App\Http\Controllers\Master\TokoController::class);

    Route::get('master/role/dataTable', [\App\Http\Controllers\User\RoleController::class, 'dataTable'])->name('role.dataTable');
    Route::resource('master/role', \App\Http\Controllers\User\RoleController::class);

    Route::get('user-management/users/profile-settings', [\App\Http\Controllers\User\UserController::class, 'profileView'])->name('profile.index');
    Route::post('user-management/users/profile-settings-process', [\App\Http\Controllers\User\UserController::class, 'profileProcess'])->name('profile.process');
    Route::get('user-management/users/getSelectedData', [\App\Http\Controllers\User\UserController::class, 'getSelectData'])->name('user.selected.data');
    Route::get('user-management/users/password', [\App\Http\Controllers\User\UserController::class, 'passwordView'])->name('password.index');
    Route::post('user-management/users/passwordprocess', [\App\Http\Controllers\User\UserController::class, 'passwordProcess'])->name('password.process');
    Route::resource('user-management/role', \App\Http\Controllers\User\RoleController::class);
    Route::resource('user-management/users', \App\Http\Controllers\User\UserController::class);

});


Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('login/process', [\App\Http\Controllers\LoginController::class, 'loginProcess'])->name('login.process');
//Route::get('landing',[\App\Http\Controllers\LoginController::class,'landing'])->name('landing');
