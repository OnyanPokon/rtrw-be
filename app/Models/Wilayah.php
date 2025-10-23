<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'tipe',
        'kode_wilayah',
    ];

    public function rtrw()
    {
        return $this->hasMany(Rtrw::class);
    }
}
