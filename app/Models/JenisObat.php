<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisObat;

class JenisObat extends Model
{
    use HasFactory;

    protected $table = 'jenis_obat'; // Nama tabel di database
    protected $fillable = ['jenis', 'deskripsi_jenis', 'image_url']; // Kolom yang dapat diisi
    public function run()
    {
        JenisObat::create([
            'jenis' => 'Obat Bebas',
            'deskripsi_jenis' => 'Deskripsi untuk obat bebas',
        ]);

        JenisObat::create([
            'jenis' => 'Obat Keras',
            'deskripsi_jenis' => 'Deskripsi untuk obat keras',
        ]);

        JenisObat::create([
            'jenis' => 'Obat Bebas Terbatas',
            'deskripsi_jenis' => 'Deskripsi untuk obat bebas terbatas',
        ]);

        JenisObat::create([
            'jenis' => 'Obat Herbal',
            'deskripsi_jenis' => 'Deskripsi untuk obat herbal',
        ]);

        JenisObat::create([
            'jenis' => 'Obat Generik',
            'deskripsi_jenis' => 'Deskripsi untuk obat generik',
        ]);
        
    }
}
