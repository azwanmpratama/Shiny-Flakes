<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total Uang Masuk
        $totalRevenue = Transaction::sum('total_price');

        // 2. Total Jumlah Transaksi
        $totalTransactions = Transaction::count();

        // 3. Total Stok Barang (Pastikan model Product/Produk sesuai)
        // Kita pakai try-catch biar aman kalau nama kolom beda
        try {
            $totalStock = Product::sum('stok'); 
        } catch (\Exception $e) {
            $totalStock = 0;
        }

        // 4. 3 Transaksi Terakhir (Untuk List Recent Orders)
        $recentTransactions = Transaction::latest()->take(3)->get();

        // 5. Barang Terlaris
        $bestSeller = Transaction::select('item_name', DB::raw('count(*) as total'))
            ->groupBy('item_name')
            ->orderBy('total', 'desc')
            ->first();
            
        $bestSellerName = $bestSeller ? $bestSeller->item_name : 'Belum ada penjualan';

        // Kirim semua variabel ke View
        return view('pages.dashboard', compact(
            'totalRevenue', 
            'totalTransactions', 
            'totalStock', 
            'recentTransactions',
            'bestSellerName'
        ));
    }

    public function search() {
        return view('pages.dashboard');
    }
}