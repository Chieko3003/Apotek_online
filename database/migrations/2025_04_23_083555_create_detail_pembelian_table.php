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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')->constrained('obat')->onDelete('cascade');
            $table->integer('jumlah_beli');
            $table->double('harga_beli');
            $table->foreignId('id_pembelian')->constrained('pembelian')->onDelete('cascade');
            // $table->foreignId('id_distributor')->constrained('distributors')->onDelete('cascade'); // Pastikan 'distributors' bukan 'distributor'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
