<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::middleware('IsLogin', 'CekRole:admin, kasir')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/pembelian', [PembelianController::class, 'index']);
    Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/search', [DashboardController::class, 'search'])->name('search');


Route::get('/produk', [ProdukController::class, 'index'])->name('indexProduk');

Route::post('/tambah-produk', [ProdukController::class, 'store'])->name('tambah-produk');

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');

Route::get('/user', [UserController::class, 'index'])->name('user');


// Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route::get('/produk/{id}', [ProdukController::class, 'show']);
// Route::patch('/produk/update/{id}', [ProdukController::class, 'update']);
// Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy']);
// Route::get('/produk/show/trash', [ProdukController::class, 'trash']);
// Route::get('/produk/trash/restore/{id}', [ProdukController::class, 'restore']);
// Route::get('/produk/trash/delete/permanent/{id}', [ProdukController::class, 'permanentDelete']);
