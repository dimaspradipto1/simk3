<?php

namespace App\Http\Requests;

use App\Models\Pelatihanhse;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PelatihanhseRequest extends FormRequest
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
        return [
            'nama_pelatihan' => 'required|string',
            'kategori' => ['required', 'in:' . implode(',', array_keys(Pelatihanhse::KATEGORI))],
            'tanggal' => 'required|date',
            'durasi' => 'required|string|max:255',
            'jumlah_peserta' => 'required|integer|min:0',
            'instruktur' => 'required|string|max:255',
            'kelas' => ['required', 'in:' . implode(',', array_keys(Pelatihanhse::METODE))],
            'nilai_evaluasi' => 'required|integer|min:0|max:100',
            'sertifikat' => ['required', 'in:' . implode(',', array_keys(Pelatihanhse::SERTIFIKASI))],
            'status' => ['required', 'in:' . implode(',', array_keys(Pelatihanhse::STATUS))],
            'link_sertifikat' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_pelatihan.required' => 'Nama pelatihan harus diisi',
            'kategori.required' => 'Kategori harus dipilih',
            'kategori.in' => 'Kategori tidak valid',
            'tanggal.required' => 'Tanggal harus diisi',
            'durasi.required' => 'Durasi harus diisi',
            'jumlah_peserta.required' => 'Jumlah peserta harus diisi',
            'instruktur.required' => 'Instruktur harus diisi',
            'kelas.required' => 'Metode harus dipilih',
            'kelas.in' => 'Metode tidak valid',
            'nilai_evaluasi.required' => 'Nilai evaluasi harus diisi',
            'sertifikat.required' => 'Sertifikasi harus dipilih',
            'sertifikat.in' => 'Sertifikasi tidak valid',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
