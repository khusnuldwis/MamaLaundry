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
        Schema::create('categori_layanans', function (Blueprint $table) {
<<<<<<< Updated upstream:database/migrations/2024_09_20_161908_create_kategori_layanans_table.php
            $table->id();
            $table->string('nama_kategori');
=======
            $table->id('categori_layanan_id');
            $table->string('nama_jenis_layanan');
>>>>>>> Stashed changes:database/migrations/2024_09_20_161908_create_categori_layanans_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categori_layanans');
    }
};
