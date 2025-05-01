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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan', 255) ->nullable(false);
            $table->string('email', 255)->unique()->nullable(false);
            $table->string('kata_kunci', 15) ->nullable(false);
            $table->string('no_telp', 15) ->nullable(false);
            $table->string('alamat1', 255) ->nullable(false);
            $table->string('kota1', 255) ->nullable(false);
            $table->string('propinsi1', 255) ->nullable(false);
            $table->string('kodepos1', 25) ->nullable(false);
            $table->string('alamat2', 255)->nullable(true);
            $table->string('kota2', 255)->nullable(true);
            $table->string('propinsi2', 255)->nullable(true);
            $table->string('kodepos2', 25)->nullable(true);
            $table->string('foto', 255)->nullable(true);
            $table->string('url_ktp', 255)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
