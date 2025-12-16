<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'products'; // Pastikan nama tabel benar
    protected $fillable = ['name', 'price', 'stock', 'image', 'image_back', 'tag', 'description'];
}