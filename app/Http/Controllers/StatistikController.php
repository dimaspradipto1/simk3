<?php

namespace App\Http\Controllers;

use App\Models\Ibpr;
use App\Models\Inpeksik3;
use App\Models\Karyawan;
use App\Models\LaporanInsiden;
use App\Models\ObservasiBahaya;
use App\Models\Pelatihanhse;

class StatistikController extends Controller
{
    /**
     * Approximate annual working hours per active employee, used as the
     * man-hours denominator for the OSHA-style FR/SR/IR formulas since the
     * system does not track actual timesheet hours.
     */
    private const JAM_KERJA_PER_KARYAWAN_PER_TAHUN = 2000;

    /**
     * Maps free-text jenis_insiden values to the standard OSHA incident
     * categories shown in the "Distribusi Jenis Insiden" chart.
     */
    private const JENIS_INSIDEN_MAP = [
        'Nearmiss' => 'Near Miss',
        'Kecelakaan Kerja' => 'LTI',
        'Kebakaran' => 'Property Damage',
        'Tumpahan B3' => 'Property Damage',
        'Kerusakan Alat' => 'Property Damage',
    ];

    public function index()
    {
        $totalKaryawanAktif = max(Karyawan::where('is_active', true)->count(), 1);
        $totalJamKerja = $totalKaryawanAktif * self::JAM_KERJA_PER_KARYAWAN_PER_TAHUN;

        $totalInsiden = LaporanInsiden::count();
        $totalLti = LaporanInsiden::where('jenis_insiden', 'Kecelakaan Kerja')->count();
        $totalHariHilang = LaporanInsiden::whereNotNull('hari_hilang')->get()
            ->sum(fn ($laporan) => (int) $laporan->hari_hilang);

        $fr = round(($totalLti * 1_000_000) / $totalJamKerja, 2);
        $sr = round(($totalHariHilang * 1_000_000) / $totalJamKerja, 2);
        $ir = round(($totalInsiden * 200_000) / $totalJamKerja, 2);

        $inspeksiTotal = Inpeksik3::where('status_selesai', '!=', 'batal')->count();
        $inspeksiSelesai = Inpeksik3::where('status_selesai', 'selesai')->count();
        $complianceInspeksi = $inspeksiTotal > 0 ? round(($inspeksiSelesai / $inspeksiTotal) * 100) : 0;

        $pelatihanSelesaiQuery = Pelatihanhse::where('status', 'selesai');
        $jumlahSesiPelatihan = (clone $pelatihanSelesaiQuery)->count();
        $rataNilaiPelatihan = round((clone $pelatihanSelesaiQuery)->avg('nilai_evaluasi') ?? 0);

        $risikoEkstrem = Ibpr::where('status', '!=', 'selesai')->get()
            ->filter(fn ($ibpr) => $ibpr->tingkat === 'Ekstrem')
            ->count();

        $distribusiInsiden = ['Near Miss' => 0, 'First Aid' => 0, 'LTI' => 0, 'Property Damage' => 0];
        foreach (LaporanInsiden::pluck('jenis_insiden') as $jenis) {
            $kategori = self::JENIS_INSIDEN_MAP[$jenis] ?? 'First Aid';
            $distribusiInsiden[$kategori]++;
        }

        $skorPerAreaChart = Inpeksik3::selectRaw('lokasi, ROUND(AVG(skor)) as rata_skor')
            ->groupBy('lokasi')
            ->orderBy('lokasi')
            ->get()
            ->map(fn ($row) => [
                'x' => $row->lokasi,
                'y' => (int) $row->rata_skor,
                'fillColor' => $row->rata_skor >= 80 ? '#4a9d5f' : '#d1893c',
            ])
            ->values();

        $statusObservasi = [
            'Open' => ObservasiBahaya::where('status', 'open')->count(),
            'In Progress' => ObservasiBahaya::where('status', 'in_progress')->count(),
            'Closed' => ObservasiBahaya::where('status', 'closed')->count(),
        ];

        $tingkatRisikoColors = [
            'Rendah' => '#4a9d5f',
            'Sedang' => '#d1893c',
            'Tinggi' => '#d9614f',
            'Ekstrem' => '#7a2020',
        ];
        $tingkatRisiko = ['Rendah' => 0, 'Sedang' => 0, 'Tinggi' => 0, 'Ekstrem' => 0];
        foreach (Ibpr::all() as $ibpr) {
            $tingkatRisiko[$ibpr->tingkat]++;
        }
        $tingkatRisikoChart = collect($tingkatRisiko)
            ->map(fn ($jumlah, $tingkat) => ['x' => $tingkat, 'y' => $jumlah, 'fillColor' => $tingkatRisikoColors[$tingkat]])
            ->values();

        return view('pages.statistik.index', [
            'fr' => $fr,
            'sr' => $sr,
            'ir' => $ir,
            'complianceInspeksi' => $complianceInspeksi,
            'inspeksiSelesai' => $inspeksiSelesai,
            'inspeksiTotal' => $inspeksiTotal,
            'rataNilaiPelatihan' => $rataNilaiPelatihan,
            'jumlahSesiPelatihan' => $jumlahSesiPelatihan,
            'risikoEkstrem' => $risikoEkstrem,
            'distribusiInsiden' => $distribusiInsiden,
            'skorPerAreaChart' => $skorPerAreaChart,
            'statusObservasi' => $statusObservasi,
            'tingkatRisikoChart' => $tingkatRisikoChart,
        ]);
    }
}
