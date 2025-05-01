<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
   
    // Nama tabel yang benar (singular)
    protected $table = 'pembelian';

    protected $fillable = [
        'nonota',
        'tgl_pembelian',
        'total_bayar',
        'id_distributor'
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }
}
