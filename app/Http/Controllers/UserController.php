<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan Model User diimport
use Illuminate\Support\Facades\Hash; // Untuk enkripsi password

class UserController extends Controller
{
    // Menampilkan Halaman User List
    public function index()
    {
        // Mengambil semua user, diurutkan terbaru
        $users = User::orderBy('created_at', 'desc')->get();
        return view('user.user', compact('users')); // Sesuaikan nama folder view Anda
    }

    // Menyimpan User Baru (Add User)
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'username' => 'required|string|max:255|unique:users,name', // Username harus unik
            'email' => 'required|email|unique:users,email', // Email harus unik
            'password' => 'required|min:6', // Password minimal 6 karakter
            'role' => 'required|in:admin,kasir,customer', // Role yang diizinkan
        ]);

        // 2. Simpan ke Database
        User::create([
            'name' => $request->username, // Kolom di DB biasanya 'name'
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    // Menghapus User
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}