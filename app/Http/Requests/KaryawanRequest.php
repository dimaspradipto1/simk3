<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
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
        $karyawanId = $this->route('karyawan')?->id;

        return [
            'departemen_id' => 'required|exists:departemens,id',
            'nip' => ['nullable', 'string', 'max:255', Rule::unique('karyawans', 'nip')->ignore($karyawanId)],
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'departemen_id.required' => 'Departemen harus dipilih',
            'departemen_id.exists' => 'Departemen tidak valid',
            'nip.unique' => 'NIP sudah digunakan',
            'nama.required' => 'Nama karyawan tidak boleh kosong',
        ];
    }
}
