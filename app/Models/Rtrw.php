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
        'tahun_mulai',
        'tahun_akhir',
        'wilayah_id',
        'deskripsi',
        'dokumen_file',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function klasifikasis()
    {
        return $this->hasMany(Klasifikasi::class);
    }
}
