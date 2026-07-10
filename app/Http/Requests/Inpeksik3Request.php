<?php

namespace App\Http\Requests;

use App\Models\Inpeksik3;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class Inpeksik3Request extends FormRequest
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
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'jenis_inpeksi' => ['required', 'in:' . implode(',', array_keys(Inpeksik3::JENIS_INPEKSI))],
            'inspektor' => 'required|string|max:255',
            'skor' => 'required|integer|min:0|max:100',
            'status_selesai' => ['required', 'in:' . implode(',', array_keys(Inpeksik3::STATUS_SELESAI))],
            'temuan' => 'nullable|string',
            'rekomendasi' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'jenis_inpeksi.required' => 'Jenis inspeksi harus dipilih',
            'jenis_inpeksi.in' => 'Jenis inspeksi tidak valid',
            'inspektor.required' => 'Inspektor harus diisi',
            'skor.required' => 'Skor harus diisi',
            'skor.integer' => 'Skor harus berupa angka',
            'skor.min' => 'Skor minimal 0',
            'skor.max' => 'Skor maksimal 100',
            'status_selesai.required' => 'Status selesai harus dipilih',
            'status_selesai.in' => 'Status selesai tidak valid',
        ];
    }
}
