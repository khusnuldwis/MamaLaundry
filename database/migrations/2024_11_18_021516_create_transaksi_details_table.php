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
            $table->id(); // Primary Key
            $table->unsignedBigInteger('transaksi_id')->index(); // Foreign Key ke tabel transaksi
            $table->unsignedBigInteger('layanan_id')->index(); // Foreign Key ke tabel layanan (jenis layanan yang diambil)
            $table->unsignedBigInteger('metode_layanan_id')->index(); 
            $table->integer('berat')->nullable(); // Berat barang dalam kilogram (untuk laundry)
            $table->integer('harga'); // Harga per kilogram layanan
            $table->integer('total_harga'); // Total harga untuk layanan ini (berat x harga_per_kg)
            $table->timestamps();
        
            
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
