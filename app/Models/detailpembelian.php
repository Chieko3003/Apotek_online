<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';

    protected $fillable = [
        'id_obat',
        'jumlah_beli',
        'harga_beli',
        'id_pembelian',
    ];

    // Relasi ke tabel Obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    // Relasi ke tabel Pembelian
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }
}
