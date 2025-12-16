<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian; // Pastikan Model Pembelian sudah ada
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // Halaman Utama Shop
    public function index()
    {
        // Kalau kamu ambil data dari DB, ubah array ini jadi Product::all();
        // Ini contoh statis biar halaman shop-nya jalan dulu
        $products = [
            [
                'id' => 1,
                'name' => 'Shiny Flakes T-Shirt',
                'price' => 150000,
                'image' => 'tshirt.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Hoodie Black Edition',
                'price' => 300000,
                'image' => 'hoodie.jpg'
            ]
        ];

        return view('shop.index', compact('products'));
    }

    // Logic Checkout & Simpan ke DB (Sesuai yang bocor di screenshot kamu)
    public function checkout(Request $request)
    {
        // 1. Bersihkan Format Rupiah (Rp 150.000 -> 150000)
        $cleanPrice = (int) str_replace(['Rp ', '.'], '', $request->total_price);
        
        // 2. Cek User Login
        $customerName = auth()->check() ? auth()->user()->name : 'Guest Customer';

        // 3. Simpan ke Database
        try {
            $transaksi = Pembelian::create([
                'nama_pembeli'   => $customerName,
                'nama_barang'    => $request->item_name,
                'qty'            => $request->quantity,
                'total_harga'    => $cleanPrice,
                'status'         => 'Paid',
                'pembayaran'     => $request->payment_method,
                'tanggal'        => now(),
            ]);

            // Sukses: Kirim data balik ke JS untuk dicetak struk
            return response()->json([
                'status' => 'success', 
                'data'   => $transaksi
            ]);

        } catch (\Exception $e) {
            // Gagal
            return response()->json([
                'status'  => 'error', 
                'message' => 'GAGAL SIMPAN KE DB: ' . $e->getMessage()
            ], 500);
        }
    }
}