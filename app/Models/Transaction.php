<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Ini PENTING! Agar Laravel mengizinkan kita menyimpan data ke kolom-kolom ini.
    // protected $guarded = []; berarti "tidak ada yang dijaga", semua boleh diisi.
    protected $guarded = []; 
    
    // Atau bisa juga pakai fillable:
    // protected $fillable = ['customer_name', 'item_name', 'quantity', 'total_price', 'payment_method', 'status'];
}