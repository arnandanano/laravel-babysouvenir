<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProgresProduksiController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ListProdukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TrackingOrderController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Landing Page
Route::resource('/', LandingPageController::class)->only('index');
Route::resource('/tracking-order', TrackingOrderController::class)->only('index');
Route::get('/tracking-order{id}', [TrackingOrderController::class, 'showTrackingResult']);
Route::post('/test/search', [TrackingOrderController::class, 'search'])->name('search');
Route::resource('/produk', ListProdukController::class)->only('index');
Route::get('/produk', [ListProdukController::class, 'index'])->name('index');

// Login Logout
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'logout')->name('logout');
});

// // Register
// Route::controller(RegisterController::class)->group(function(){
//     Route::get('/register', 'index')->name('register');
//     Route::post('/register', 'store')->name('register.store');
// });

// Dashboard
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::resource('/nota', NotaController::class);
    Route::resource('/katalogproduk', ProdukController::class);
    Route::resource('/progresproduksi', ProgresProduksiController::class);
    Route::get('/getdata-nota/{id}', [ProgresProduksiController::class, 'getDataNota']);
    Route::resource('/laporanpenjualan', LaporanPenjualanController::class)->only('index');
    Route::get('/laporanpenjualan/export', [LaporanPenjualanController::class, 'exportToExcel'])->name('sales.export');
    Route::resource('/stokbarang', StokController::class)->except('show');
    Route::get('/cek-stok', [StokController::class, 'cekStok'])->name('cek-stok');
});

// Khusus Superuser
Route::middleware('superuser')->group(function(){
    Route::resource('/kategori', KategoriController::class)->except('show');
    Route::resource('/satuan', SatuanController::class)->except('show');
    Route::resource('/user', UserController::class)->except('show');
    Route::resource('/testimonial', TestimonialController::class);
    Route::resource('/pengaturan', SiteSettingController::class)->only(['index', 'store']);
});

// // Test Get Data
// Route::get('/getdata-role', [RoleController::class, 'getRole']);
// Route::get('/getdata-stok', [StokController::class, 'getStok']);
// Route::get('/getdata-kategori', [KategoriController::class, 'getKategori']);
// Route::get('/proses', [App\Http\Controllers\ProsesController::class, 'index']);
// Route::get('/packing', [App\Http\Controllers\PackingController::class, 'index']);
