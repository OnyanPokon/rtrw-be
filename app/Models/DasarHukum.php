<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DasarHukum extends Model
{
    protected $table = 'dasar_hukum';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'file_dokumen',
    ];

    public function rtrws()
    {
        return $this->hasMany(Rtrw::class, 'dasar_hukum_id');
    }

}
