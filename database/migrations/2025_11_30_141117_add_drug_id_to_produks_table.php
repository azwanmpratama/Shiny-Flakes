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
    Schema::table('produks', function (Blueprint $table) {
        // Menambah kolom drug_id setelah id
        $table->foreignId('drug_id')->after('id')->nullable()->constrained('drugs')->onDelete('cascade');
        
        // Opsional: Jika dulu anda pakai kolom 'nama_produk', kolom itu bisa dihapus atau dibiarkan nullable
        // $table->dropColumn('nama_produk'); 
    });
}

public function down()
{
    Schema::table('produks', function (Blueprint $table) {
        $table->dropForeign(['drug_id']);
        $table->dropColumn('drug_id');
    });
}
};
