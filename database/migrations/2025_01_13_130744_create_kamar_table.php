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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('idKamar'); // Primary key
            $table->string('namaKamar'); // Nama kamar
            $table->string('gambarKamar'); // Path gambar kamar
            $table->integer('jmlhKasur'); // Jumlah kasur
            $table->integer('jmlhKamarMandi'); // Jumlah kamar mandi
            $table->boolean('ac'); // Tersedia AC atau tidak (true/false)
            $table->decimal('hargaKamar', 10, 2); // Harga kamar
            $table->integer('lantaiKamar'); // Harga kamar
            $table->enum('statusKamar', ['Tersedia', 'Terisi', 'Perbaikan'])->default('Tersedia'); // Status kamar
            $table->integer('kapasitasKamar'); // Kapasitas kamar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('room');
    // }
};
