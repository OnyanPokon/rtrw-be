<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RtrwRequest extends FormRequest
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
        return [
            'nama' => 'required|string|max:255',
            'tahun_mulai' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'tahun_akhir' => 'required|digits:4|integer|min:1900|gte:tahun_mulai',
            'wilayah_id' => 'required|exists:wilayah,id',
            'deskripsi' => 'nullable|string',
            'dokumen_file' => 'nullable|file|mimes:pdf|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama RTRW wajib diisi.',
            'nama.string' => 'Nama RTRW harus berupa teks.',
            'nama.max' => 'Nama RTRW maksimal 255 karakter.',

            'tahun_mulai.required' => 'Tahun mulai wajib diisi.',
            'tahun_mulai.digits' => 'Tahun mulai harus terdiri dari 4 digit.',
            'tahun_mulai.integer' => 'Tahun mulai harus berupa angka.',
            'tahun_mulai.min' => 'Tahun mulai tidak valid.',
            'tahun_mulai.max' => 'Tahun mulai tidak boleh melebihi tahun saat ini.',

            'tahun_akhir.required' => 'Tahun akhir wajib diisi.',
            'tahun_akhir.digits' => 'Tahun akhir harus terdiri dari 4 digit.',
            'tahun_akhir.integer' => 'Tahun akhir harus berupa angka.',
            'tahun_akhir.min' => 'Tahun akhir tidak valid.',
            'tahun_akhir.gte' => 'Tahun akhir tidak boleh lebih kecil dari tahun mulai.',

            'wilayah_id.required' => 'Wilayah wajib diisi.',
            'wilayah_id.exists' => 'Wilayah yang dipilih tidak ditemukan.',

            'deskripsi.string' => 'Deskripsi harus berupa teks.',

            'dokumen_file.file' => 'Dokumen harus berupa file.',
            'dokumen_file.mimes' => 'Dokumen hanya boleh berupa file PDF',
            'dokumen_file.max' => 'Ukuran dokumen maksimal 5MB.',
        ];
    }
}
