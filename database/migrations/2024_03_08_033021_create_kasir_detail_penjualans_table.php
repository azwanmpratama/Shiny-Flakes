<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kasir_detail_penjualans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penjualan_id');
            $table->integer('produk_id');
            $table->integer('jumlah_produk');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir_detail_penjualans');
    }
};
