<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// ROUTE PUBLIK (Toko & Login) - Tidak perlu login untuk akses ini
// =========================================================================

// Halaman Toko (Kamuflase & Asli)
Route::get('/shop', function () {
    return view('shop.index');
})->name('shop.index');

Route::get('/shop/detail', function () {
    return view('shop.detail');
})->name('shop.detail');

// Halaman Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// =========================================================================
// ROUTE AUTHENTICATED (Harus Login Dulu)
// =========================================================================

// Logout (Cukup middleware 'auth', tidak perlu cek role)
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])
    ->name('actionlogout')
    ->middleware('auth');

// Grup Route yang butuh Login DAN Pengecekan Role (Admin/Kasir)
// Perbaikan: Mengganti 'IsLogin' menjadi 'auth'
Route::middleware(['auth', 'CekRole:admin,kasir'])->group(function() {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
    
    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('indexProduk');
    Route::post('/tambah-produk', [ProdukController::class, 'store'])->name('tambah-produk');
    
    // Transaksi
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    
    // User Management
    Route::get('/user', [UserController::class, 'index'])->name('user');
    
    // Route untuk Drug List (Admin)
    Route::get('/drug', [App\Http\Controllers\DrugController::class, 'index'])->name('drug.index');
    Route::post('/drug/store', [App\Http\Controllers\DrugController::class, 'store'])->name('drug.store');
    Route::delete('/drug/delete/{id}', [App\Http\Controllers\DrugController::class, 'destroy'])->name('drug.delete');

    // Route untuk Proses Checkout (Simpan Transaksi)
    Route::post('/shop/checkout', [ShopController::class, 'store'])->name('shop.checkout');

});

// Opsional: Route CRUD Produk lainnya (jika diperlukan nanti)
// Route::patch('/produk/update/{id}', [ProdukController::class, 'update']);
// Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy']);