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
<<<<<<< HEAD
        Schema::create('metode__layanans', function (Blueprint $table) {
            $table->id('metode_layanan_id');
=======
        Schema::create('metode_layanans', function (Blueprint $table) {
            $table->id();
>>>>>>> ac5a93aad188f3e4aa46d4e76834f9df84425dff
            $table->string('nama_metode_layanan');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode__layanans');
    }
};
