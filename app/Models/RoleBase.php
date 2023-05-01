<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleBase extends Model
{
    use HasFactory;

    protected $table = 'role_base';

    protected $fillable = [
        'kode',
        'id_tajwid',
        'pattern',
        'deleted_tajwid_name'
    ];

    public function tajwid() {
        return $this->belongsTo(Tajwid::class, 'id_tajwid');
    }

    public function tandaTajwid() {
        return $this->belongsToMany(TandaTajwid::class);
    }
}
