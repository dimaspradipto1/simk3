<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ibpr extends Model
{
    public const HIERARKI = [
        'eliminasi' => 'Eliminasi',
        'substitusi' => 'Substitusi',
        'rekayasa' => 'Rekayasa',
        'administrasi' => 'Administrasi',
        'apd' => 'APD',
        'eliminasi_substitusi' => 'Eliminasi/Substitusi',
    ];

    public const STATUS = [
        'open' => 'Open',
        'in_progress' => 'In Progress',
        'selesai' => 'Selesai',
    ];

    protected $fillable = [
        'aktivitas',
        'bahaya',
        'konsekuensi',
        'pengendalian_saat_ini',
        'keparahan',
        'kemungkinan',
        'hierarki',
        'pic',
        'pengendalian_tambahan',
        'batas_waktu',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'keparahan' => 'integer',
            'kemungkinan' => 'integer',
            'batas_waktu' => 'date',
        ];
    }

    public function getRisikoAttribute(): int
    {
        return $this->keparahan * $this->kemungkinan;
    }

    public function getTingkatAttribute(): string
    {
        return match (true) {
            $this->risiko >= 15 => 'Ekstrem',
            $this->risiko >= 10 => 'Tinggi',
            $this->risiko >= 5 => 'Sedang',
            default => 'Rendah',
        };
    }
}
