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
    ];

    public function roleBase() {
        return $this->belongsToMany(RoleBase::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pertanyaan() {
        return $this->belongsToMany(Pertanyaan::class);
    }

}
