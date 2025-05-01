<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User dengan jabatan admin
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('1'), // Ganti dengan password yang aman
            'jabatan'  => 'admin',
        ]);

        // User dengan jabatan apoteker
        User::create([
            'name'     => 'Apoteker',
            'email'    => 'apoteker@gmail.com',
            'password' => bcrypt('2'),
            'jabatan'  => 'apoteker',
        ]);

        // User dengan jabatan karyawan
        User::create([
            'name'     => 'Karyawan',
            'email'    => 'karyawan@gmail.com',
            'password' => bcrypt('3'),
            'jabatan'  => 'karyawan',
        ]);

        // User dengan jabatan kasir
        User::create([
            'name'     => 'Kasir',
            'email'    => 'kasir@gmail.com',
            'password' => bcrypt('4'),
            'jabatan'  => 'kasir',
        ]);

        // User dengan jabatan pemilik
        User::create([
            'name'     => 'Pemilik',
            'email'    => 'pemilik@gmail.com',
            'password' => bcrypt('5'),
            'jabatan'  => 'pemilik',
        ]);
    }
}