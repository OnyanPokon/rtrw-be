<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PkkprlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $docRule = $this->isMethod('POST') ? 'required' : 'nullable';

        return [
            'nama' => 'required|string',
            'deskripsi' => 'string',
            'geojson_file' => "$docRule|file|extensions:geojson",

            'klasifikasi_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'deskripsi.string' => 'Deskripsi harus berupa text.',
            'klasifikasi_id' => 'Klasifikasi wajib diisi',
            'geojson_file.file' => 'geojson_file harus berupa file.',
            'geojson_file.mimes' => 'geojson_file harus berformat geojson.',
        ];
    }
}
