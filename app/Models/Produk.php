<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks'; 

    protected $fillable = [
        'drug_id', // Tambahkan ini
        'harga',   // Sesuaikan dengan nama kolom di db anda (price/harga)
        'stok',    // Sesuaikan dengan nama kolom di db anda (stock/stok)
        'image',
        // 'nama_produk' -> ini bisa dihapus dari fillable jika sudah pakai drug_id
    ];

    // Relasi ke tabel Drugs
    public function drug()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }
}
