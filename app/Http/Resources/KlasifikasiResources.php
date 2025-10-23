<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KlasifikasiResources extends JsonResource
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
            'rtrw' => [
                'id' => $this->rtrw->id ?? null,
                'nama' => $this->rtrw->name ?? null,
                'tahun_mulai' => $this->rtrw->tahun_mulai ?? null,
                'tahun_akhir' => $this->rtrw->tahun_akhir ?? null,
                'deskripsi' => $this->rtrw->deskripsi ?? null,
                'wilayah' => [
                    'id' => $this->rtrw->wilayah->id ?? null,
                    'nama' => $this->rtrw->wilayah->nama ?? null,
                    'tipe' => $this->rtrw->wilayah->tipe ?? null,
                    'kode_wilayah' => $this->rtrw->wilayah->kode_wilayah ?? null,
                ],
            ],
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'created_at' => $this->created_at->format('d F Y'),
            'updated_at' => $this->updated_at->format('d F Y'),
        ];
    }
}
