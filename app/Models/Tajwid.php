<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tajwid extends Model
{
    use HasFactory;

    protected $table = 'tajwid';

    protected $fillable = [
        'kode',
        'nama_tajwid',
        'penjelasan',
        'kategori_id',
        'ex_ayah',
        'ex_surah',
        'pattern_ex',
    ];

    public function ruleTajwid() {
        return $this->belongsToMany(RuleTajwid::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pertanyaan() {
        return $this->belongsToMany(Pertanyaan::class);
    }

}
