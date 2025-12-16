<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Pastikan Model Transaction di-import

class PembelianController extends Controller
{
    public function index()
    {
        // Mengambil semua data transaksi, urutkan dari yang terbaru
        $transaksi = Transaction::orderBy('created_at', 'desc')->get();
        
        // Kirim data ke view
        return view('pembelian.pembelian', compact('transaksi'));
    }

    public function cetakStruk($id)
    {
        // Cari transaksi berdasarkan ID
        $trx = Transaction::findOrFail($id);
        
        // Tampilkan view struk
        return view('pembelian.struk', compact('trx'));
    }
}