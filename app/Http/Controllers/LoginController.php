<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Jika sudah login, cek role untuk redirect yang benar
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'kasir') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('shop.index');
            }
        }
        return view('auth.login');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba Login
        if (Auth::attempt($data)) {
            $user = Auth::user();

            // --- LOGIKA PENGARAHAN (REDIRECT) ---
            if ($user->role == 'admin' || $user->role == 'kasir') {
                // Jika Admin/Kasir -> Masuk Dashboard Admin
                return redirect()->route('dashboard');
            } else {
                // Jika Customer -> Masuk Halaman Belanja
                return redirect()->route('shop.index');
            }
            // ------------------------------------
            
        } else {
            // Jika Password Salah
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}