<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tajwid;

class TajwidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tajwid::create([
            'kode' => 'H000',
            'nama_tajwid' => 'Inisialisasi',
            'kategori_id' => 1,
        ]);

        Tajwid::create([
            'kode' => 'H001',
            'nama_tajwid' => 'Idzhar Halqi',
            'kategori_id' => 2,
        ]);

        Tajwid::create([
            'kode' => 'H002',
            'nama_tajwid' => 'Ikhfa\'',
            'kategori_id' => 2,
        ]);

        Tajwid::create([
            'kode' => 'H003',
            'nama_tajwid' => 'Iqlab',
            'kategori_id' => 2,
        ]);

        Tajwid::create([
            'kode' => 'H004',
            'nama_tajwid' => 'Idghom Bighunnah',
            'kategori_id' => 2,
        ]);

        Tajwid::create([
            'kode' => 'H005',
            'nama_tajwid' => 'Idghom Bilaghunnah',
            'kategori_id' => 2,
        ]);

        Tajwid::create([
            'kode' => 'H006',
            'nama_tajwid' => 'Ikhfa\' Syafawi',
            'kategori_id' => 3,
        ]);

        Tajwid::create([
            'kode' => 'H007',
            'nama_tajwid' => 'Idghom Mimi',
            'kategori_id' => 3,
        ]);

        Tajwid::create([
            'kode' => 'H008',
            'nama_tajwid' => 'Idzhar Syafawi',
            'kategori_id' => 3,
        ]);

        Tajwid::create([
            'kode' => 'H009',
            'nama_tajwid' => 'Ghunnah',
            'kategori_id' => 4,
        ]);

        Tajwid::create([
            'kode' => 'H010',
            'nama_tajwid' => 'Al-Qomariyah',
            'kategori_id' => 5,
        ]);

        Tajwid::create([
            'kode' => 'H011',
            'nama_tajwid' => 'Al-Syamsiyah',
            'kategori_id' => 5,
        ]);

        Tajwid::create([
            'kode' => 'H012',
            'nama_tajwid' => 'Ro\' Tafkhim',
            'kategori_id' => 6,
        ]);

        Tajwid::create([
            'kode' => 'H013',
            'nama_tajwid' => 'Ro\' Tarqiq',
            'kategori_id' => 6,
        ]);

        Tajwid::create([
            'kode' => 'H014',
            'nama_tajwid' => 'Lam Tarqiq',
            'kategori_id' => 7,
        ]);

        Tajwid::create([
            'kode' => 'H015',
            'nama_tajwid' => 'Lam Tafkhim',
            'kategori_id' => 7,
        ]);

        Tajwid::create([
            'kode' => 'H016',
            'nama_tajwid' => 'Qolqolah Sughro',
            'kategori_id' => 8,
        ]);

        Tajwid::create([
            'kode' => 'H017',
            'nama_tajwid' => 'Qolqolah Qubro',
            'kategori_id' => 8,
        ]);
    }
}
