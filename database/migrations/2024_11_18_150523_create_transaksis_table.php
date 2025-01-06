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
            $table->id(); // Primary Key
            $table->string('number')->unique(); // Kode unik transaksi
            $table->unsignedBigInteger('user_id')->index();
            $table->string('nama_pelanggan'); // Nama pelanggan
            $table->string('no_hp'); // Nomor telepon pelanggan
            $table->date('tanggal_selesai')->nullable(); // Tanggal selesai
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Lunas']); // Status pembayaran
            $table->integer('total_harga')->nullable(); // Total harga transaksi (dihitung dari detail transaksi)
            $table->timestamps();
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
