<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('created_at','DESC')->get();
        return view('produk.produk', compact('produks'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'image' => 'required|image|mimes:jpg,jpeg,png,svg',
    ]);

    // Simpan gambar ke penyimpanan file Laravel
    $imagePath = $request->file('image')->store('public/produk_images');

    // Ambil nama file gambar
    $imageName = basename($imagePath);

    // Tambah data ke database
    Produk::create([
       'nama_produk' => $request->nama_produk,
       'harga' => $request->harga,
       'stok' => $request->stok,
       'image' => $imageName, // Simpan nama file gambar ke dalam kolom 'image'
    ]);

    // Mengirimkan data produk ke tampilan 'produk'
    return redirect()->route('indexProduk')->with('successAdd', 'Berhasil menambahkan produk!');
}


    public function create()
    {
    //
    }


    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $validatedData = $request->validate([
                'nama' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
            ]);

            $produk->update($validatedData);

            return response()->json($produk, 200);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return response()->json(['message' => 'Produk berhasil dihapus.'], 200);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }
    }

    public function trash()
    {
        $deletedProduks = Produk::onlyTrashed()->get();
        return response()->json($deletedProduks);
    }

    public function restore($id)
    {
        $restoredProduk = Produk::withTrashed()->find($id);
        if ($restoredProduk) {
            $restoredProduk->restore();
            return response()->json(['message' => 'Produk berhasil dipulihkan.'], 200);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan dalam sampah.'], 404);
        }
    }

    public function permanentDelete($id)
    {
        $deletedProduk = Produk::withTrashed()->find($id);
        if ($deletedProduk) {
            $deletedProduk->forceDelete();
            return response()->json(['message' => 'Produk berhasil dihapus permanen.'], 200);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan dalam sampah.'], 404);
        }
    }
}
