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
        Schema::create('transaksi__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id'); 
            $table->unsignedBigInteger('metode_layanan_id'); 
            $table->unsignedBigInteger('transaksi_id'); 
            $table->unsignedBigInteger('user_id'); 
            $table->integer('jumlah'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi__details');
    }
};
