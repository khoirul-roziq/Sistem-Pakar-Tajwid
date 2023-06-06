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
        'kategori_id',
        'tajwid_id',
        'reference'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($pertanyaan) {
            $pertanyaan->kategoriJawaban()->detach();
            $pertanyaan->tajwidJawaban()->detach();
            $pertanyaan->tandaTajwidJawaban()->detach();
        });
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function tajwid() {
        return $this->belongsTo(Tajwid::class, 'tajwid_id');
    }

    public function kategoriJawaban() {
        return $this->belongsToMany(Kategori::class);
    }

    public function tajwidJawaban() {
        return $this->belongsToMany(Tajwid::class);
    }

    public function tandaTajwidJawaban() {
        return $this->belongsToMany(TandaTajwid::class);
    }
}
