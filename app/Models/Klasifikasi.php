<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'rtrw_id',
        'nama',
        'deskripsi',
    ];

    public function rtrw()
    {
        return $this->belongsTo(Rtrw::class);
    }

    public function polaRuang()
    {
        return $this->hasMany(PolaRuang::class);
    }
}
