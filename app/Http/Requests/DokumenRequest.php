<?php

namespace App\Http\Requests;

use App\Models\Dokumen;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DokumenRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $dokumenId = $this->route('dokumen')?->id;

        return [
            'nomor_dokumen' => ['required', 'string', 'max:255', Rule::unique('dokumens', 'nomor_dokumen')->ignore($dokumenId)],
            'jenis' => ['required', 'in:' . implode(',', array_keys(Dokumen::JENIS))],
            'nama_dokumen' => 'required|string',
            'versi' => 'nullable|string|max:50',
            'pemilik_dokumen' => 'nullable|string|max:255',
            'tanggal_efektif' => 'required|date',
            'tanggal_review' => 'nullable|date',
            'status' => ['required', 'in:' . implode(',', array_keys(Dokumen::STATUS))],
            'link_dokumen' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nomor_dokumen.required' => 'No. Dokumen harus diisi',
            'nomor_dokumen.unique' => 'No. Dokumen sudah digunakan',
            'jenis.required' => 'Jenis harus dipilih',
            'jenis.in' => 'Jenis tidak valid',
            'nama_dokumen.required' => 'Judul Dokumen harus diisi',
            'tanggal_efektif.required' => 'Tanggal efektif harus diisi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
