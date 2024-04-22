<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Tambahkan logika untuk halaman dashboard di sini
        return view('pages.dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function search(Request $request)
    {
        // Logika pencarian di sini...

        // Misalnya, kita hanya akan mencetak input pencarian dari request
        $keyword = $request->input('keyword');
        dd($keyword); // Print input pencarian
    }
}
