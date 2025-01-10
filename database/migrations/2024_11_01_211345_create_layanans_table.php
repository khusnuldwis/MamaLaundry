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
        Schema::create('layanans', function (Blueprint $table) {
<<<<<<< Updated upstream:database/migrations/2024_11_01_211345_create_layanans_table.php
            $table->id();
=======
            $table->id('layanan_id');

>>>>>>> Stashed changes:database/migrations/2024_09_20_163004_create_layanans_table.php
            $table->string('nama_layanan');
            $table->string('thumbnail');
            $table->enum('unit', ['1', '2'])->comment('1=Kg, 2=Pcs');
            $table->unsignedBigInteger('category_id')->index();
            $table->integer('harga');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
