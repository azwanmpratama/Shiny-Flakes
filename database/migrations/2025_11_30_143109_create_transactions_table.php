<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name')->default('Anonymous'); // Nama pembeli (atau Anonim)
        $table->string('item_name'); // Nama Barang
        $table->integer('quantity'); // Jumlah
        $table->decimal('total_price', 15, 2); // Total Harga
        $table->string('payment_method'); // BTC / ETH
        $table->string('status')->default('Pending'); // Status
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
