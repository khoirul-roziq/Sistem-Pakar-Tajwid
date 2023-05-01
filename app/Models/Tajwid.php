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
        'penjelasan'
    ];

    public function RoleBase() {
        return $this->belongsToMany(RoleBase::class);
    }
}
