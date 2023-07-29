<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleTajwid extends Model
{
    use HasFactory;

    protected $table = 'rule_tajwid';

    protected $fillable = [
        'kode',
        'id_tajwid',
        'rule',
        'second_rule',
        'deleted_tajwid_name',
        'keterangan',
        'synonym'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function ($ruleTajwid) {
            $ruleTajwid->tandaTajwid()->detach();
        });
    }

    public function tajwid() {
        return $this->belongsTo(Tajwid::class, 'id_tajwid');
    }

    public function tandaTajwid() {
        return $this->belongsToMany(TandaTajwid::class);
    }

}
