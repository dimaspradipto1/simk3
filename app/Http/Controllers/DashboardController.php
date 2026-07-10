<?php

namespace App\Http\Controllers;

use App\Models\Apd;
use App\Models\Dokumen;
use App\Models\Ibpr;
use App\Models\Inpeksik3;
use App\Models\Karyawan;
use App\Models\LaporanInsiden;
use App\Models\ObservasiBahaya;
use App\Models\Pelatihanhse;
use App\Models\TanggapDarurat;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        $access = collect(config('hse_menu'))
            ->map(fn ($roles) => in_array($role, $roles, true));

        $recentInsiden = LaporanInsiden::with('user')->latest()->take(5)->get();
        $insidenOpenCount = LaporanInsiden::where('status', 'open')->count();

        $observasiOpenCount = $access['observasi-bahaya']
            ? ObservasiBahaya::where('status', 'open')->count()
            : null;

        $inspeksiBelumCount = $access['inpeksik3']
            ? Inpeksik3::where('status_selesai', 'belum')->count()
            : null;

        $pelatihanMendatang = $access['pelatihanhse']
            ? Pelatihanhse::where('status', 'dijadwalkan')->orderBy('tanggal')->take(3)->get()
            : collect();

        $risikoEkstrem = $access['ibpr']
            ? Ibpr::where('status', '!=', 'selesai')->get()->filter(fn ($ibpr) => $ibpr->tingkat === 'Ekstrem')->count()
            : null;

        $apdAlertCount = $access['apd']
            ? Apd::all()->filter(fn ($apd) => $apd->status === 'Kadaluarsa' || $apd->selisih < 0)->count()
            : null;

        $dokumenTerlambatCount = $access['dokumen']
            ? Dokumen::all()->filter(fn ($dokumen) => $dokumen->peringatan)->count()
            : null;

        $kontakDarurat = $access['tanggap-darurat']
            ? TanggapDarurat::orderBy('kategori')->take(4)->get()
            : collect();

        $complianceInspeksi = null;
        if ($access['statistik']) {
            $inspeksiTotal = Inpeksik3::where('status_selesai', '!=', 'batal')->count();
            $inspeksiSelesai = Inpeksik3::where('status_selesai', 'selesai')->count();
            $complianceInspeksi = $inspeksiTotal > 0 ? round(($inspeksiSelesai / $inspeksiTotal) * 100) : 0;
        }

        $totalKaryawanAktif = Karyawan::where('is_active', true)->count();

        return view('layouts.dashboard.index', [
            'access' => $access,
            'recentInsiden' => $recentInsiden,
            'insidenOpenCount' => $insidenOpenCount,
            'observasiOpenCount' => $observasiOpenCount,
            'inspeksiBelumCount' => $inspeksiBelumCount,
            'pelatihanMendatang' => $pelatihanMendatang,
            'risikoEkstrem' => $risikoEkstrem,
            'apdAlertCount' => $apdAlertCount,
            'dokumenTerlambatCount' => $dokumenTerlambatCount,
            'kontakDarurat' => $kontakDarurat,
            'complianceInspeksi' => $complianceInspeksi,
            'totalKaryawanAktif' => $totalKaryawanAktif,
        ]);
    }
}
