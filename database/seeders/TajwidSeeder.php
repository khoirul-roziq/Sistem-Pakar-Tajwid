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
            'kode' => 'H001',
            'nama_tajwid' => 'Idzhar Halqi',
        ]);

        Tajwid::create([
            'kode' => 'H002',
            'nama_tajwid' => 'Ikhfa\'',
        ]);

        Tajwid::create([
            'kode' => 'H003',
            'nama_tajwid' => 'Iqlab',
        ]);

        Tajwid::create([
            'kode' => 'H004',
            'nama_tajwid' => 'Idghom Bighunnah',
        ]);

        Tajwid::create([
            'kode' => 'H005',
            'nama_tajwid' => 'Idghom Bilaghunnah',
        ]);

        Tajwid::create([
            'kode' => 'H006',
            'nama_tajwid' => 'Ikhfa\' Syafawi',
        ]);

        Tajwid::create([
            'kode' => 'H007',
            'nama_tajwid' => 'Idghom Mimi',
        ]);

        Tajwid::create([
            'kode' => 'H008',
            'nama_tajwid' => 'Idzhar Syafawi',
        ]);

        Tajwid::create([
            'kode' => 'H009',
            'nama_tajwid' => 'Ghunnah',
        ]);

        Tajwid::create([
            'kode' => 'H010',
            'nama_tajwid' => 'Al-Qomariyah',
        ]);

        Tajwid::create([
            'kode' => 'H011',
            'nama_tajwid' => 'Al-Syamsiyah',
        ]);

        Tajwid::create([
            'kode' => 'H012',
            'nama_tajwid' => 'Ro\' Tafkhim',
        ]);

        Tajwid::create([
            'kode' => 'H013',
            'nama_tajwid' => 'Ro\' Tarqiq',
        ]);

        Tajwid::create([
            'kode' => 'H014',
            'nama_tajwid' => 'Lam Tarqiq',
        ]);

        Tajwid::create([
            'kode' => 'H015',
            'nama_tajwid' => 'Lam Tafkhim',
        ]);

        Tajwid::create([
            'kode' => 'H016',
            'nama_tajwid' => 'Qolqolah Sughro',
        ]);

        Tajwid::create([
            'kode' => 'H017',
            'nama_tajwid' => 'Qolqolah Qubro',
        ]);
    }
}
