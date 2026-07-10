<?php

namespace App\Http\Requests;

use App\Models\Apd;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ApdRequest extends FormRequest
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
            'jenis_apd' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'jumlah_tersedia' => 'required|integer|min:0',
            'jumlah_dibutuhkan' => 'required|integer|min:0',
            'kondisi' => ['required', 'in:' . implode(',', array_keys(Apd::KONDISI))],
            'tanggal_beli' => 'required|date',
            'masa_pakai' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_apd.required' => 'Jenis APD harus diisi',
            'merek.required' => 'Merek/Model harus diisi',
            'jumlah_tersedia.required' => 'Jumlah tersedia harus diisi',
            'jumlah_dibutuhkan.required' => 'Jumlah dibutuhkan harus diisi',
            'kondisi.required' => 'Kondisi harus dipilih',
            'kondisi.in' => 'Kondisi tidak valid',
            'tanggal_beli.required' => 'Tanggal beli harus diisi',
            'masa_pakai.required' => 'Masa pakai harus diisi',
            'masa_pakai.min' => 'Masa pakai minimal 1 bulan',
        ];
    }
}
