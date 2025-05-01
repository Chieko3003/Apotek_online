<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin',
        'pemilik',
        'kasir',
        'apoteker',
        'pemilik', // Tambahkan kolom yang sesuai dengan tabel jabatan
    ];
}
