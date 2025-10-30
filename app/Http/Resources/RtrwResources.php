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
            'deskripsi' => $this->deskripsi,
            'wilayah' => [
                'id' => $this->wilayah->id ?? null,
                'nama' => $this->wilayah->nama ?? null,
                'tipe' => $this->wilayah->tipe ?? null,
                'kode_wilayah' => $this->wilayah->kode_wilayah ?? null,
            ],
            'periode' => [
                'id' => $this->periode->id ?? null,
                'tahun_mulai' => $this->periode->tahun_mulai ?? null,
                'tahun_akhir' => $this->periode->tahun_akhir ?? null,
            ],
            'dasar_hukum' => [
                'id' => $this->dasarHukum->id ?? null,
                'nama' => $this->dasarHukum->nama ?? null,
                'file_dokumen' => $this->dasarHukum->file_dokumen ?? null,
            ],
        ];
    }
}
