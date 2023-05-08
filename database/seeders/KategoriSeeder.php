<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'kode' => 'K001',
            'nama_kategori' => 'Nun Mati/ Tanwin',
        ]);

        Kategori::create([
            'kode' => 'K002',
            'nama_kategori' => 'Mim Mati',
        ]);

        Kategori::create([
            'kode' => 'K003',
            'nama_kategori' => 'Ghunnah',
        ]);

        Kategori::create([
            'kode' => 'K004',
            'nama_kategori' => 'Lam Ta\'rif',
        ]);

        Kategori::create([
            'kode' => 'K005',
            'nama_kategori' => 'Ro\'',
        ]);

        Kategori::create([
            'kode' => 'K006',
            'nama_kategori' => 'Lam',
        ]);

        Kategori::create([
            'kode' => 'K007',
            'nama_kategori' => 'Qolqolah',
        ]);

    }
}
