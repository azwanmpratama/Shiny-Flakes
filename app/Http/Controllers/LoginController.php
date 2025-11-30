<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        // Tambahkan logika untuk halaman login di sini
        return view('auth.login');
    }

    public function actionlogin(Request $request)
{
    // Validasi form
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

        // Ambil data email dan password dari form login
        $credentials = $request->only('email', 'password');

    // Lakukan proses autentikasi dengan menggunakan credentials
    if (Auth::attempt($credentials)) {
        // #$request->session()->regenerate();
        // Jika autentikasi berhasil, arahkan pengguna ke halaman sesuai dengan peran (role) pengguna
        if (Auth::user()->role == 'admin') {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->role == 'kasir') {
            return redirect()->route('dashboard');
        }
    } else {
        // Jika autentikasi gagal, kembalikan pengguna ke halaman login dengan pesan error
        return redirect()->back()->with('error', 'Gagal login, coba lagi!');
    }
    }

    public function actionlogout()
    {
    // Lakukan proses logout pengguna
    Auth::logout();

    // Redirect pengguna ke halaman login setelah logout
    return redirect()->route('login');
    }
}