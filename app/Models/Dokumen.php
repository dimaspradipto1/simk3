<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    public const JENIS = [
        'sop' => 'SOP',
        'prosedur' => 'Prosedur',
        'formulir' => 'Formulir',
        'kebijakan' => 'Kebijakan',
        'manual' => 'Manual',
        'instruksi_kerja' => 'Instruksi Kerja',
    ];

    public const STATUS = [
        'aktif' => 'Aktif',
        'review' => 'Review',
        'obsolete' => 'Obsolete',
    ];

    protected $fillable = [
        'nomor_dokumen',
        'jenis',
        'nama_dokumen',
        'versi',
        'pemilik_dokumen',
        'tanggal_efektif',
        'tanggal_review',
        'status',
        'link_dokumen',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_efektif' => 'date',
            'tanggal_review' => 'date',
        ];
    }

    public function getPeringatanAttribute(): ?string
    {
        if ($this->status !== 'obsolete' && $this->tanggal_review && now()->gt($this->tanggal_review)) {
            return 'Terlambat Review';
        }

        return null;
    }
}
