<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihanhse extends Model
{
    public const KATEGORI = [
        'k3_umum' => 'K3 Umum',
        'kebakaran' => 'Kebakaran',
        'apd' => 'APD',
        'kesehatan' => 'Kesehatan',
        'energi' => 'Energi',
        'ruang_terbatas' => 'Ruang Terbatas',
        'manajemen' => 'Manajemen',
        'lingkungan' => 'Lingkungan',
        'kimia' => 'Kimia',
    ];

    public const METODE = [
        'kelas' => 'Kelas',
        'praktik' => 'Praktik',
        'kelas_praktik' => 'Kelas+Praktik',
        'online' => 'Online',
        'e_learning' => 'E-Learning',
    ];

    public const SERTIFIKASI = [
        'ya' => 'Ya',
        'tidak' => 'Tidak',
    ];

    public const STATUS = [
        'selesai' => 'Selesai',
        'dijadwalkan' => 'Dijadwalkan',
        'batal' => 'Batal',
    ];

    protected $table = 'pelatihanhses';

    protected $fillable = [
        'nama_pelatihan',
        'kategori',
        'tanggal',
        'durasi',
        'jumlah_peserta',
        'instruktur',
        'kelas',
        'nilai_evaluasi',
        'sertifikat',
        'status',
        'link_sertifikat',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'jumlah_peserta' => 'integer',
            'nilai_evaluasi' => 'integer',
        ];
    }
}
