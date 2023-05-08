<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';

    protected $fillable = [
        'kode',
        'nama_jawaban',
        'representasi',
        'kategori'
    ];

    public function pertanyaan() {
        return $this->belongsToMany(Pertanyaan::class);
    }
}
