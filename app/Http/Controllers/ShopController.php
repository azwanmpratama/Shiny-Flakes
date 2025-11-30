<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class ShopController extends Controller
{
    public function store(Request $request)
    {
        // 1. Bersihkan Data Harga
        // Menghapus "Rp", titik, koma, spasi, dll. Hanya menyisakan angka.
        $rawPrice = $request->total_price;
        $cleanPrice = preg_replace('/[^0-9]/', '', $rawPrice);

        // 2. Simpan ke Database
        try {
            Transaction::create([
                'customer_name' => 'Anonymous User', // Atau Auth::user()->name jika login
                'item_name'     => $request->item_name,
                'quantity'      => $request->quantity,
                'total_price'   => $cleanPrice, // Masukkan harga yang sudah bersih
                'payment_method'=> $request->payment_method,
                'status'        => 'Paid (Verifying)'
            ]);

            return response()->json(['success' => true, 'message' => 'Success']);
            
        } catch (\Exception $e) {
            // Jika masih error, kirim pesan error aslinya ke browser agar ketahuan
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}