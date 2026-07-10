<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanggapDarurat extends Model
{
    public const KATEGORI = [
        'emergency_medical' => 'Emergency Medical',
        'fire_brigade' => 'Fire Brigade',
        'security' => 'Security',
        'internal' => 'Internal',
        'asuransi' => 'Asuransi',
        'eksternal' => 'Eksternal',
    ];

    public const KATEGORI_COLORS = [
        'emergency_medical' => '#fd7e14',
        'fire_brigade' => '#dc3545',
        'security' => '#0d6efd',
        'internal' => '#198754',
        'asuransi' => '#6f42c1',
        'eksternal' => '#6c757d',
    ];

    protected $fillable = [
        'nama',
        'nomor_telepon',
        'jam_operasional',
        'kategori',
        'catatan',
    ];
}
