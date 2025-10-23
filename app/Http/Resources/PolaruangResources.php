<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PolaruangResources extends JsonResource
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
            'klasifikasi' => [
                'id' => $this->klasifikasi->id ?? null,
                'nama' => $this->klasifikasi->name ?? null,
                'deskripsi' => $this->klasifikasi->deskripsi ?? null,
                'rtrw' => [
                    'id' => $this->klasifikasi->rtrw->id ?? null,
                    'nama' => $this->klasifikasi->rtrw->name ?? null,
                    'tahun_mulai' => $this->klasifikasi->rtrw->tahun_mulai ?? null,
                    'tahun_akhir' => $this->klasifikasi->rtrw->tahun_akhir ?? null,
                    'deskripsi' => $this->klasifikasi->rtrw->deskripsi ?? null,
                    'wilayah' => [
                        'id' => $this->klasifikasi->rtrw->wilayah->id ?? null,
                        'nama' => $this->klasifikasi->rtrw->wilayah->nama ?? null,
                        'tipe' => $this->klasifikasi->rtrw->wilayah->tipe ?? null,
                        'kode_wilayah' => $this->klasifikasi->rtrw->wilayah->kode_wilayah ?? null,
                    ],
                ],
            ],
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'geojson_file' => $this->geojson_file,
            'created_at' => $this->created_at->format('d F Y'),
            'updated_at' => $this->updated_at->format('d F Y'),
        ];
    }
}
