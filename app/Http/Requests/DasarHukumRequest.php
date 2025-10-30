<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DasarHukumRequest extends FormRequest
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
            'file_dokumen' => 'required|file|mimes:pdf|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama RTRW wajib diisi.',
            'nama.string' => 'Nama RTRW harus berupa teks.',
            'nama.max' => 'Nama RTRW maksimal 255 karakter.',

            'file_dokumen.required' => 'Dokumen wajib diisi.',
            'file_dokumen.file' => 'Dokumen harus berupa file.',
            'file_dokumen.mimes' => 'Dokumen hanya boleh berupa file PDF',
            'file_dokumen.max' => 'Ukuran dokumen maksimal 5MB.',
        ];
    }
}
