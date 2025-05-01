<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = [
        'nama_obat',
        'idjenis',
        'harga_jual',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'stok',
    ];
    
    protected $casts = [
        'harga_jual' => 'integer',
        'stok' => 'integer'
    ];
    
    public function jenisObat()
    {
        return $this->belongsTo(JenisObat::class, 'idjenis');
    }
}
