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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('no_hp'); 
            $table->text('alamat'); 
        $table->unsignedBigInteger('layanan_id')->index();  // Reference to the layanan table
        $table->float('berat');
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_selesai');
            $table->enum('status_barang', ['Diterima', 'Proses', 'Selesai', 'Diambil']);
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Lunas']);
            $table->timestamps();

        $table->foreign('layanan_id')->references('id')->on('layanans')->onDelete('cascade');  // Foreign key for layanan

        });            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
