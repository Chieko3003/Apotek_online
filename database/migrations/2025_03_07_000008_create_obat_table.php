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
        Schema::create('obat', function (Blueprint $table) {
            // $table->id();
            // $table->string('nama_obat', 100)->unique()->nullable(false);
            // $table->foreignId('idjenis')->constrained('jenis_obat')->onDelete('cascade');
            // $table->integer('harga_jual');
            // $table->string('deskripsi_obat', 255)->nullable(true);
            // $table->string('foto1', 255)->nullable(true);
            // $table->string('foto2', 255)->nullable(true);
            // $table->string('foto3', 255)->nullable(true);
            // $table->integer('stok');
            // $table->timestamps();

            // $table->foreign('idjenis')->references('id')->on('jenis_obat')->onDelete('cascade');
            $table->id();
            $table->string('nama_obat', 100);
            $table->unsignedBigInteger('idjenis');
            $table->double('harga_jual');
            $table->text('deskripsi')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('idjenis')->references('id')->on('jenis_obat')->onDelete('cascade');
           });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
