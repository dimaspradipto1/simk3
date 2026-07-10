<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inpeksik3 extends Model
{
    public const JENIS_INPEKSI = [
        'rutin_harian' => 'Rutin Harian',
        'rutin_mingguan' => 'Rutin Mingguan',
        'rutin_bulanan' => 'Rutin Bulanan',
        'khusus' => 'Khusus',
        'audit_internal' => 'Audit Internal',
        'audit_eksternal' => 'Audit Eksternal',
    ];

    public const STATUS_SELESAI = [
        'selesai' => 'Selesai',
        'belum' => 'Belum',
        'batal' => 'Batal',
    ];

    protected $table = 'inpeksik3s';

    protected $fillable = [
        'tanggal',
        'lokasi',
        'jenis_inpeksi',
        'inspektor',
        'skor',
        'status_selesai',
        'temuan',
        'rekomendasi',
        'tindak_lanjut',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'skor' => 'integer',
        ];
    }
}
