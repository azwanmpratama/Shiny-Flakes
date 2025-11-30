<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Drug;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // ---------------------------------------
        // 1. BUAT AKUN ADMIN & KASIR
        // ---------------------------------------
        User::create([
            'name' => 'Azwan',
            'email' => 'azwan@gmail.com',
            'password' => Hash::make('azwan123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        // ---------------------------------------
        // 2. DATA SESUAI SCREENSHOT (Master & Produk)
        // ---------------------------------------
        $items = [
            [
                'name' => 'Marijuana', 
                'category' => 'Organic', 
                'price' => 85000000, 
                'stock' => 290
            ],
            [
                'name' => 'Cocaine', 
                'category' => 'Powder', 
                'price' => 450000000, 
                'stock' => 58
            ],
            [
                'name' => 'AK-47', 
                'category' => 'Weapon', 
                'price' => 39000000, 
                'stock' => 500
            ],
            [
                'name' => 'Desert Eagle', 
                'category' => 'Weapon', 
                'price' => 19000000, 
                'stock' => 225
            ],
            [
                'name' => 'L115A1', 
                'category' => 'Weapon', 
                'price' => 185000000, 
                'stock' => 410
            ],
            [
                'name' => 'SS-2 Pindad', 
                'category' => 'Weapon', 
                'price' => 18000000, 
                'stock' => 250
            ],
            [
                'name' => 'M-16 USA', 
                'category' => 'Weapon', 
                'price' => 23000000, 
                'stock' => 200
            ],
            [
                'name' => 'Ecstasy', 
                'category' => 'Pills', 
                'price' => 1050000000, 
                'stock' => 385
            ],
            [
                'name' => 'H', // Heroin
                'category' => 'Powder', 
                'price' => 1900000000, 
                'stock' => 20
            ],
            [
                'name' => 'Magic Mushrooms', 
                'category' => 'Organic', 
                'price' => 2500000, 
                'stock' => 180
            ],
            [
                'name' => 'China White', 
                'category' => 'Powder', 
                'price' => 1600000000, 
                'stock' => 225
            ],
            [
                'name' => 'FN P90', 
                'category' => 'Weapon', 
                'price' => 32000000, 
                'stock' => 440
            ],
        ];

        // Loop data di atas untuk dimasukkan ke database
        foreach ($items as $item) {
            
            // A. Buat Master Data (Agar muncul di Dropdown 'Add Product')
            $drug = Drug::create([
                'name' => $item['name'],
                'category' => $item['category']
            ]);

            // B. Buat Data Produk (Agar muncul di Tabel Dashboard dengan Harga & Stok)
            Product::create([
                'drug_id' => $drug->id,
                'price' => $item['price'],
                'stock' => $item['stock'],
                'image' => null // Gambar kosong dulu, nanti bisa di-edit upload manual
            ]);
        }
    }
}