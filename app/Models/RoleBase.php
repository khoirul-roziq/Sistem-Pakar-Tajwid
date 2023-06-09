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
        'role',
        'second_role',
        'deleted_tajwid_name',
        'keterangan'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($roleBase) {
            $roleBase->tandaTajwid()->detach();
        });
    }

    public function tajwid() {
        return $this->belongsTo(Tajwid::class, 'id_tajwid');
    }

    public function tandaTajwid() {
        return $this->belongsToMany(TandaTajwid::class);
    }
}
