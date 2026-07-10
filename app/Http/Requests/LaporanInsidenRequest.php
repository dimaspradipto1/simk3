<?php

namespace App\Http\Requests;

use App\Models\LaporanInsiden;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LaporanInsidenRequest extends FormRequest
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
            'jenis_insiden' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'required|string|max:255',
            'nama_korban' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'departemen' => 'nullable|string|max:255',
            'hari_hilang' => 'nullable|string|max:255',
            'deskripsi_kejadian' => 'nullable|string',
            'penyebab_langsung' => 'nullable|string',
            'penyebab_dasar' => 'nullable|string',
            'tindakan_segera' => 'nullable|string',
            'tindakan_perbaikan' => 'nullable|string',
            'status' => [
                $this->isMethod('post') ? 'nullable' : 'required',
                'in:' . implode(',', array_keys(LaporanInsiden::STATUSES)),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_insiden.required' => 'Jenis insiden harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Format tanggal tidak valid',
            'waktu.required' => 'Waktu harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'nama_korban.required' => 'Nama korban harus diisi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
