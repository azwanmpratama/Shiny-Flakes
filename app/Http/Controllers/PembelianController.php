<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    public function index()
    {
        $transaksis = Transaction::latest()->get();

        return view('pembelian.pembelian', compact('transaksis'));
    }
}
