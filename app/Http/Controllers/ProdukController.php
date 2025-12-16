<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('created_at', 'desc')->get();
        return view('produk.produk', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'image_back' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048', // Validasi gambar ke-2
        ]);

        $cleanHarga = str_replace('.', '', $request->harga);

        // 1. Upload Gambar Depan
        $imageName = time() . '_front_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('assets/images/products'), $imageName);

        // 2. Upload Gambar Belakang (Jika Ada)
        $imageBackName = null;
        if ($request->hasFile('image_back')) {
            $imageBackName = time() . '_back_' . $request->image_back->getClientOriginalName();
            $request->image_back->move(public_path('assets/images/products'), $imageBackName);
        }

        // 3. Simpan
        Produk::create([
           'name' => $request->nama_produk, 
           'price' => $cleanHarga,
           'stock' => $request->stok,               
           'image' => $imageName,
           'image_back' => $imageBackName, // Simpan nama file belakang (bisa null)
           'tag' => 'NEW', 
           'description' => 'Premium authentic streetwear designed for comfort.'
        ]);

        return redirect()->route('indexProduk')->with('successAdd', 'Product added successfully!');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            if(File::exists(public_path('assets/images/products/' . $produk->image))){
                File::delete(public_path('assets/images/products/' . $produk->image));
            }
            $produk->delete();
            return redirect()->route('indexProduk')->with('successAdd', 'Product deleted successfully.');
        } else {
            return redirect()->route('indexProduk')->with('error', 'Product not found.');
        }
    }
}