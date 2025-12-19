<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('tahun_terbit');
            
            // --- TAMBAHKAN KOLOM STOK DI SINI ---
            $table->integer('stok')->default(0); 
            // ------------------------------------

            // Kolom Foreign Key
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('penerbit_id');

            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategoris')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('penerbit_id')
                  ->references('id')
                  ->on('penerbits')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};