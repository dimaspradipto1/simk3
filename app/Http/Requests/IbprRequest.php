<?php

namespace App\Http\Requests;

use App\Models\Ibpr;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IbprRequest extends FormRequest
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
            'aktivitas' => 'required|string|max:255',
            'bahaya' => 'required|string',
            'konsekuensi' => 'nullable|string',
            'pengendalian_saat_ini' => 'nullable|string',
            'keparahan' => 'required|integer|min:1|max:5',
            'kemungkinan' => 'required|integer|min:1|max:5',
            'hierarki' => ['nullable', 'in:' . implode(',', array_keys(Ibpr::HIERARKI))],
            'pic' => 'nullable|string|max:255',
            'pengendalian_tambahan' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
            'status' => ['required', 'in:' . implode(',', array_keys(Ibpr::STATUS))],
        ];
    }

    public function messages(): array
    {
        return [
            'aktivitas.required' => 'Proses/Aktivitas harus diisi',
            'bahaya.required' => 'Bahaya harus diisi',
            'keparahan.required' => 'Keparahan harus diisi',
            'keparahan.min' => 'Keparahan minimal 1',
            'keparahan.max' => 'Keparahan maksimal 5',
            'kemungkinan.required' => 'Kemungkinan harus diisi',
            'kemungkinan.min' => 'Kemungkinan minimal 1',
            'kemungkinan.max' => 'Kemungkinan maksimal 5',
            'hierarki.in' => 'Hierarki pengendalian tidak valid',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }
}
