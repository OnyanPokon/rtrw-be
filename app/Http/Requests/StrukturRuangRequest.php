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
        $docRule = $this->isMethod('POST') ? 'required' : 'nullable';

        return [
            'nama'           => 'required|string',
            'deskripsi'      => 'nullable|string',
            'geojson_file' => "$docRule|file|extensions:geojson",

            'klasifikasi_id' => 'required|integer',
            'tipe_geometri'  => 'required|in:polyline,point',
            'icon_titik'     => 'nullable|string',
            'tipe_garis'     => 'nullable|string',
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

            'tipe_geometri.required' => 'Tipe geometri wajib dipilih.',
            'tipe_geometri.in'       => 'Tipe geometri harus polyline atau point.',

            'icon_titik.string'      => 'Icon harus berupa teks.',

            'warna.required'     => 'Warna wajib diisi.',
            'warna.string'       => 'Warna harus berupa teks.',
        ];
    }
}
