<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaporanInsiden extends Model
{
    public const STATUS_OPEN = 'open';

    public const STATUS_IN_PROGRESS = 'in_progress';

    public const STATUS_CLOSED = 'closed';

    public const STATUSES = [
        self::STATUS_OPEN => 'Open',
        self::STATUS_IN_PROGRESS => 'In Progress',
        self::STATUS_CLOSED => 'Closed',
    ];

    protected $fillable = [
        'no_laporan',
        'user_id',
        'jenis_insiden',
        'tanggal',
        'waktu',
        'lokasi',
        'nama_korban',
        'jabatan',
        'departemen',
        'hari_hilang',
        'deskripsi_kejadian',
        'penyebab_langsung',
        'penyebab_dasar',
        'tindakan_segera',
        'tindakan_perbaikan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $laporan) {
            if (empty($laporan->no_laporan)) {
                $laporan->no_laporan = self::generateNoLaporan();
            }

            if (empty($laporan->status)) {
                $laporan->status = self::STATUS_OPEN;
            }
        });
    }

    public static function generateNoLaporan(): string
    {
        $year = now()->year;

        return DB::transaction(function () use ($year) {
            $lastNumber = self::where('no_laporan', 'like', "INC-{$year}-%")
                ->lockForUpdate()
                ->orderByDesc('id')
                ->value('no_laporan');

            $sequence = $lastNumber
                ? ((int) substr($lastNumber, -3)) + 1
                : 1;

            return sprintf('INC-%d-%03d', $year, $sequence);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
