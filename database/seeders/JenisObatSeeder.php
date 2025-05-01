<?php
namespace Database\Seeders;

use App\Models\JenisObat;
use Illuminate\Database\Seeder;

class JenisObatSeeder extends Seeder
{
    public function run()
    {
        // Data jenis obat
        $jenisObat = [
            [
                'jenis' => 'Obat Bebas',
                'deskripsi_jenis' => 'Obat yang dapat dibeli tanpa resep dokter',
            ],
            [
                'jenis' => 'Obat Bebas Terbatas',
                'deskripsi_jenis' => 'Obat yang dapat dibeli tanpa resep tetapi dengan peringatan khusus',
            ],
            [
                'jenis' => 'Obat Keras',
                'deskripsi_jenis' => 'Obat yang hanya dapat dibeli dengan resep dokter',
            ],
            [
                'jenis' => 'Obat Herbal',
                'deskripsi_jenis' => 'Obat yang berasal dari bahan-bahan alami',
            ],
            [
                'jenis' => 'Obat Generik',
                'deskripsi_jenis' => 'Obat dengan kandungan zat aktif yang sama dengan obat paten',
            ],
        ];

        // Tambahkan data ke tabel jenis_obat
        foreach ($jenisObat as $jenis) {
            JenisObat::create($jenis);
        }
    }
}