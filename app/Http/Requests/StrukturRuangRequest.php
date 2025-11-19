<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StrukturRuangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'           => 'required|string',
            'deskripsi'      => 'nullable|string',
            'geojson_file'   => 'nullable|file|extensions:geojson|max:2048',
            'klasifikasi_id' => 'required|integer',
            'tipe_geometri'  => 'required|in:polyline,point',
            'icon_titik'     => 'nullable|required_if:tipe_geometri,point|string',
            'tipe_garis'     => 'nullable|required_if:tipe_geometri,polyline|in:solid,dashed',
            'warna'          => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'        => 'Nama wajib diisi.',
            'nama.string'          => 'Nama harus berupa teks.',

            'deskripsi.string'     => 'Deskripsi harus berupa teks.',

            'klasifikasi_id.required' => 'Klasifikasi wajib diisi.',

            'geojson_file.file'    => 'File GeoJSON tidak valid.',
            'geojson_file.extensions' => 'File harus berformat .geojson.',
            'geojson_file.max'     => 'Ukuran file tidak boleh lebih dari 2MB.',

            'tipe_geometri.required' => 'Tipe geometri wajib dipilih.',
            'tipe_geometri.in'       => 'Tipe geometri harus polyline atau point.',

            'icon_titik.required_if' => 'Icon wajib diisi untuk geometri titik.',
            'icon_titik.string'      => 'Icon harus berupa teks.',

            'tipe_garis.required_if' => 'Tipe garis wajib diisi untuk geometri polyline.',
            'tipe_garis.in'          => 'Tipe garis harus solid atau dashed.',

            'warna.required'     => 'Warna wajib diisi.',
            'warna.string'       => 'Warna harus berupa teks.',
        ];
    }
}
