<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;
use App\Models\DetailPembelian;

class DetailPembelianSeeder extends Seeder
{
    public function run()
    {
        $obat = Obat::first();  // ambil data obat pertama

        DetailPembelian::create([
            'id_obat' => $obat->id,
            'jumlah_beli' => 10,
            'harga_beli' => 50000,
            'id_pembelian' => 1, // sesuaikan id pembelian-nya
        ]);
    }
}
