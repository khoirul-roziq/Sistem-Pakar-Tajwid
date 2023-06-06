<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTajwid extends Model
{
    use HasFactory;

    protected $table = 'tanda_tajwid';

    protected $fillable = [
        'kode',
        'nama_tanda',
        'unicode',
        'jenis'
    ];

    public function roleBase() {
        return $this->belongsToMany(RoleBase::class);
    }

    public function pertanyaan() {
        return $this->belongsToMany(Pertanyaan::class);
    }
}
