<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'kode',
        'nama_kategori',
    ];

    public function pertanyaan() {
        return $this->belongsToMany(Pertanyaan::class);
    }

    public function tajwid() {
        return $this->belongsToMany(Tajwid::class);
    }
}
