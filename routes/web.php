<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController; // Pastikan ini ada
use App\Http\Controllers\DrugController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// ROUTE PUBLIK (Toko, Detail, Login, Checkout) - AKSES BEBAS
// =========================================================================

// Halaman Shop Utama
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Route Checkout (Dipindah ke sini agar Guest juga bisa beli)
// URL: /checkout, Method: checkout (Sesuai Controller baru)
Route::post('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');

// Route Detail menerima parameter ID
Route::get('/shop/detail/{id?}', function ($id = null) {
    return view('shop.detail', ['id' => $id]);
})->name('shop.detail');

// Halaman Login
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');


// =========================================================================
// ROUTE AUTHENTICATED (Harus Login Dulu)
// =========================================================================

// Logout
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])
    ->name('actionlogout')
    ->middleware('auth');

// Grup Route yang butuh Login
Route::middleware(['auth'])->group(function() {

    // (Route Checkout saya hapus dari sini karena sudah dipindah ke atas/public)

    // --- KHUSUS ADMIN & KASIR ---
    Route::middleware(['CekRole:admin,kasir'])->group(function() {
        
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/search', [DashboardController::class, 'search'])->name('search');
        
        // Manajemen Produk Fashion (ProdukController)
        Route::get('/produk', [ProdukController::class, 'index'])->name('indexProduk');
        Route::post('/tambah-produk', [ProdukController::class, 'store'])->name('tambah-produk');
        Route::patch('/produk/update/{id}', [ProdukController::class, 'update']);
        Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy']);
        
        // Transaksi (Melihat Data Pembelian)
        Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
        Route::get('/pembelian/struk/{id}', [PembelianController::class, 'cetakStruk'])->name('pembelian.struk');
        
        // Manajemen User
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        
        // Manajemen Produk Obat (DrugController)
        Route::get('/drug', [DrugController::class, 'index'])->name('drug.index');
        Route::post('/drug/store', [DrugController::class, 'store'])->name('drug.store');
        Route::delete('/drug/delete/{id}', [DrugController::class, 'destroy'])->name('drug.delete');

    });

});