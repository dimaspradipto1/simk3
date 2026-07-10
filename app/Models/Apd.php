<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apd extends Model
{
    public const KONDISI = [
        'baik' => 'Baik',
        'perlu_periksa' => 'Perlu Periksa',
        'rusak' => 'Rusak',
    ];

    protected $table = 'apds';

    protected $fillable = [
        'jenis_apd',
        'merek',
        'jumlah_tersedia',
        'jumlah_dibutuhkan',
        'kondisi',
        'tanggal_beli',
        'masa_pakai',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_tersedia' => 'integer',
            'jumlah_dibutuhkan' => 'integer',
            'tanggal_beli' => 'date',
            'masa_pakai' => 'integer',
        ];
    }

    public function getSelisihAttribute(): int
    {
        return $this->jumlah_tersedia - $this->jumlah_dibutuhkan;
    }

    public function getTanggalKadaluarsaAttribute(): \Illuminate\Support\Carbon
    {
        return $this->tanggal_beli->copy()->addMonths($this->masa_pakai);
    }

    public function getStatusAttribute(): string
    {
        return now()->gt($this->tanggal_kadaluarsa) ? 'Kadaluarsa' : 'OK';
    }
}
