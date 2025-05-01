<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    protected $table = 'distributor'; // Nama tabel sesuai migrasi

    protected $fillable = ['nama_distributor', 'telepon', 'alamat'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_distributor');
    }
}
