<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::latest()->get();
        return view('drug-list.drug', compact('drugs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required', // Hapus numeric
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        // BERSIHKAN TITIK HARGA
        $cleanPrice = str_replace('.', '', $request->price);

        // Upload
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('assets/images/drug'), $imageName);

        // Simpan
        Drug::create([
            'name' => $request->name,
            'price' => $cleanPrice, // Pakai harga bersih
            'stock' => $request->stock,
            'image' => $imageName,
            'tag' => 'PURE',
            'category' => $request->category,
            'description' => 'High purity laboratory tested substances.'
        ]);

        return redirect()->back()->with('success', 'Substance added successfully.');
    }

    public function destroy($id)
    {
        $drug = Drug::findOrFail($id);
        if(file_exists(public_path('assets/images/drug/' . $drug->image))){
            unlink(public_path('assets/images/drug/' . $drug->image));
        }
        $drug->delete();
        return redirect()->back()->with('success', 'Item removed.');
    }
}