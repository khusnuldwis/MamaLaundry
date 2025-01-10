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
<<<<<<< Updated upstream:database/migrations/2024_11_19_035036_create_layanan_transaksi_table.php
        Schema::create('layanan_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained()->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained()->onDelete('cascade');
            $table->integer('quantity'); // Menyimpan kuantitas layanan
=======
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id('transaksi_id');
    
            $table->unsignedBigInteger('karyawan_id');
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawans')->onDelete('cascade');
    
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
    
            $table->unsignedBigInteger('layanan_id');
            $table->foreign('layanan_id')->references('layanan_id')->on('layanans')->onDelete('cascade');
    
            $table->unsignedBigInteger('metode_layanan_id');
            $table->foreign('metode_layanan_id')->references('metode_layanan_id')->on('metode__layanans')->onDelete('cascade');
    
            $table->integer('quantity');
>>>>>>> Stashed changes:database/migrations/2024_10_02_145450_create_transaksis_table.php
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_transaksi');
    }
};
