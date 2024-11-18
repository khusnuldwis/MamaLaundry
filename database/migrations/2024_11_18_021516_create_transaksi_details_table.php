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
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id('transaksi_details_id'); 
            $table->unsignedBigInteger('transaksi_id'); 
            $table->unsignedBigInteger('nama_pelanggan')->nullable(); 
            $table->float('berat');  
            $table->enum('satuan', ['kg', 'pcs']);    
            $table->enum('status_barang', ['Diterima', 'Proses', 'Selesai', 'Diambil']); 
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Lunas']); 
            $table->decimal('total_pembayaran', 10, 2); 
            $table->timestamps();

            // foreign key
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_details');
    }
};
