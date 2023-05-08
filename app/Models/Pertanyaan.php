<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';

    protected $fillable = [
        'kode',
        'soal',
        'kategori_id'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($pertanyaan) {
            $pertanyaan->jawaban()->detach();
        });
    }

    public function jawaban() {
        return $this->belongsToMany(Jawaban::class);
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
