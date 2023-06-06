<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Pertanyaan::create([
            'kode' => 'P000',
            'soal' => 'Silahkan pilih kategori tajwid yang ingin kamu pelajari!',
            'kategori_id' => 1,
            'tajwid_id' => 1,
            'reference' => 0,
        ]);

        $data->jawaban()->sync([41, 42, 43, 44, 45, 46, 47]);
    }
}
