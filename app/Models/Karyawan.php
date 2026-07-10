<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    protected $fillable = [
        'departemen_id',
        'nip',
        'nama',
        'jabatan',
        'no_hp',
        'alamat',
        'tanggal_masuk',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_masuk' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }
}
