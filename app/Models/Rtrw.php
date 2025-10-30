<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rtrw extends Model
{
    protected $table = 'rtrw';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'deskripsi',
        'wilayah_id',
        'periode_id',
        'dasar_hukum_id'
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function klasifikasis()
    {
        return $this->hasMany(Klasifikasi::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }

    public function dasarHukum()
    {
        return $this->belongsTo(DasarHukum::class, 'dasar_hukum_id');
    }
}
