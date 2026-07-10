<?php

namespace App\Http\Requests;

use App\Models\ObservasiBahaya;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ObservasiRequest extends FormRequest
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
            'deskripsi_bahaya' => 'required|string',
            'kategori_bahaya' => ['required', 'in:' . implode(',', array_keys(ObservasiBahaya::KATEGORI_BAHAYA))],
            'tingkat_resiko' => ['required', 'in:' . implode(',', array_keys(ObservasiBahaya::RISK_LEVELS))],
            'tindakan_perbaikan' => 'nullable|string',
            'pic' => 'required|string|max:255',
            'target_selesai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => [
                $this->isMethod('post') ? 'nullable' : 'required',
                'in:' . implode(',', array_keys(ObservasiBahaya::STATUSES)),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi',
            'lokasi.required' => 'Lokasi harus diisi',
            'deskripsi_bahaya.required' => 'Deskripsi bahaya harus diisi',
            'kategori_bahaya.required' => 'Kategori bahaya harus dipilih',
            'kategori_bahaya.in' => 'Kategori bahaya tidak valid',
            'tingkat_resiko.required' => 'Tingkat risiko harus dipilih',
            'tingkat_resiko.in' => 'Tingkat risiko tidak valid',
            'pic.required' => 'PIC harus diisi',
            'target_selesai.required' => 'Target selesai harus diisi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
