<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RtrwResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_akhir' => $this->tahun_akhir,
            'wilayah' => [
                'id' => $this->wilayah->id ?? null,
                'nama' => $this->wilayah->nama ?? null,
                'tipe' => $this->wilayah->tipe ?? null,
                'kode_wilayah' => $this->wilayah->kode_wilayah ?? null,
            ],
            'deskripsi' => $this->deskripsi,
            'dokumen_file' => $this->dokumen_file,
            'kode_wilayah' => $this->kode_wilayah,
        ];
    }
}
