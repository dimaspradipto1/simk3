<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObservasiBahaya extends Model
{
    public const STATUS_OPEN = 'open';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_CLOSED = 'closed';

    public const STATUSES = [
        self::STATUS_OPEN => 'Open',
        self::STATUS_IN_PROGRESS => 'In Progress',
        self::STATUS_CLOSED => 'Closed',
    ];

    public const RISK_LEVELS = [
        'rendah' => 'Rendah',
        'sedang' => 'Sedang',
        'tinggi' => 'Tinggi',
    ];

    public const KATEGORI_BAHAYA = [
        'unsafe_act' => 'Unsafe Act',
        'unsafe_condition' => 'Unsafe Condition',
        'ergonomik' => 'Ergonomik',
        'kimia' => 'Kimia',
        'fisik' => 'Fisik',
        'biologi' => 'Biologi',
        'psikologi' => 'Psikologi',
    ];

    protected $fillable = [
        'tanggal',
        'lokasi',
        'deskripsi_bahaya',
        'kategori_bahaya',
        'tingkat_resiko',
        'tindakan_perbaikan',
        'pic',
        'target_selesai',
        'tanggal_selesai',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'target_selesai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $observasi) {
            if (empty($observasi->status)) {
                $observasi->status = self::STATUS_OPEN;
            }
        });
    }
}
