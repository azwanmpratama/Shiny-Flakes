<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug; // Import Model

class DrugController extends Controller
{
    // Menampilkan Halaman Drug List
    public function index()
    {
        $drugs = Drug::latest()->get();
        return view('drug-list.drug', compact('drugs'));
    }

    // Menyimpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        Drug::create([
            'name' => $request->name,
            'category' => $request->category
        ]);

        return redirect()->back()->with('success', 'New substance added to database.');
    }

    // Menghapus Data
    public function destroy($id)
    {
        $drug = Drug::findOrFail($id);
        $drug->delete();

        return redirect()->back()->with('success', 'Item removed from archives.');
    }
}