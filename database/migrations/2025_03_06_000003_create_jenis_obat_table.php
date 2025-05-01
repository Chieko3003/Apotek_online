<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_obat', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 50);
            $table->text('deskripsi_jenis')->nullable();
            $table->timestamps();
        });


        // Schema::table('jenis_obat', function (Blueprint $table) {
        //     $table->string('image_url', 255)->nullable()->after('deskripsi_jenis');
        // });
    }


    public function down(): void
    {
        Schema::dropIfExists('jenis_obat');

        
    //     Schema::table('jenis_obat', function (Blueprint $table) {
    //     $table->dropColumn('image_url');
    // });

    }
};