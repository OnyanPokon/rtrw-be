<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndikasiProgramRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'file_dokumen' => "$docRule|file|mimes:pdf",
            'klasifikasi_id' => 'required',
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
        ];
    }
}
