<?php

namespace App\Http\Requests;

use App\Models\TanggapDarurat;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TanggapDaruratRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:50',
            'jam_operasional' => 'nullable|string|max:255',
            'kategori' => ['required', 'in:' . implode(',', array_keys(TanggapDarurat::KATEGORI))],
            'catatan' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'nomor_telepon.required' => 'Nomor telepon harus diisi',
            'kategori.required' => 'Kategori harus dipilih',
            'kategori.in' => 'Kategori tidak valid',
        ];
    }
}
