@extends('layouts.dashboard.template')

@section('content')
    @php
        $roleLabels = [
            'admin' => 'Super Admin / IT',
            'hsemanger' => 'HSE Manager / Officer',
            'supervisor' => 'Supervisor / Foreman Lapangan',
            'karyawan' => 'Pekerja / Karyawan',
            'kontraktor' => 'Kontraktor / Vendor',
            'paramedis' => 'Petugas Klinik / Paramedis',
            'timtanggapdarurat' => 'Tim Tanggap Darurat (ERT)',
            'direksi' => 'Top Management / Direksi',
            'auditor' => 'Auditor (Internal/Eksternal)',
        ];
        $user = auth()->user();
    @endphp

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h5 class="mb-1">Selamat datang, {{ $user->name }} 👋</h5>
                    <span class="badge rounded-pill" style="background:#0b5c3d1a; color:#0b5c3d;">
                        {{ $roleLabels[$user->role] ?? ucfirst($user->role) }}
                    </span>
                </div>
                <div class="text-muted small">{{ now()->translatedFormat('l, d F Y') }}</div>
            </div>
        </div>

        <!-- Role-relevant stat cards -->
        <div class="row g-3 mb-1">
            <div class="col-md-4 col-lg-3">
                <div class="card text-white h-100" style="background:#b6452f; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                    <div class="card-body" style="padding:1.1rem 1.25rem;">
                        <div class="small mb-2">Laporan Insiden Open</div>
                        <div class="fs-3 fw-bold mb-1 lh-1">{{ $insidenOpenCount }}</div>
                        <div class="small opacity-75">Perlu tindak lanjut</div>
                    </div>
                </div>
            </div>

            @if ($access['observasi-bahaya'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#d1893c; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">Observasi Bahaya</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $observasiOpenCount }}</div>
                            <div class="small opacity-75">Status Open</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($access['inpeksik3'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#3f6ea6; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">Inspeksi K3</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $inspeksiBelumCount }}</div>
                            <div class="small opacity-75">Belum selesai</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($access['ibpr'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#7a2020; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">Risiko Ekstrem (IBPR)</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $risikoEkstrem }}</div>
                            <div class="small opacity-75">Perlu prioritas</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($access['apd'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#6c4a9e; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">APD Perlu Perhatian</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $apdAlertCount }}</div>
                            <div class="small opacity-75">Kadaluarsa / stok kurang</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($access['dokumen'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#4a7ab5; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">Dokumen Terlambat Review</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $dokumenTerlambatCount }}</div>
                            <div class="small opacity-75">Perlu direview ulang</div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($access['statistik'])
                <div class="col-md-4 col-lg-3">
                    <div class="card text-white h-100" style="background:#4a9d5f; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">Compliance Inspeksi</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $complianceInspeksi }}%</div>
                            <div class="small opacity-75">Inspeksi selesai</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <!-- Left: recent incidents (visible to everyone) -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Insiden Terbaru</h5>

                        @if ($recentInsiden->isEmpty())
                            <p class="text-muted mb-0">Belum ada laporan insiden.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead>
                                        <tr class="text-muted small text-uppercase">
                                            <th>No. Laporan</th>
                                            <th>Jenis</th>
                                            <th>Lokasi</th>
                                            <th>Pelapor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentInsiden as $insiden)
                                            @php
                                                $badgeClass = \App\DataTables\LaporanInsidenDataTable::STATUS_BADGES[$insiden->status] ?? 'bg-secondary';
                                                $statusLabel = \App\Models\LaporanInsiden::STATUSES[$insiden->status] ?? ucfirst($insiden->status);
                                            @endphp
                                            <tr>
                                                <td><a href="{{ route('laporan-insiden.show', $insiden) }}">{{ $insiden->no_laporan }}</a></td>
                                                <td>{{ $insiden->jenis_insiden }}</td>
                                                <td>{{ $insiden->lokasi }}</td>
                                                <td>{{ $insiden->user->name ?? '-' }}</td>
                                                <td><span class="badge rounded-pill {{ $badgeClass }}">{{ $statusLabel }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <a href="{{ route('laporan-insiden.index') }}" class="btn btn-sm btn-outline-secondary mt-2">
                            Lihat Semua <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick access grid -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Akses Cepat</h5>
                        <div class="row g-3">
                            @php
                                $quickLinks = [
                                    ['label' => 'Laporan Insiden', 'route' => 'laporan-insiden.index', 'icon' => 'bi-exclamation-triangle', 'color' => '#b6452f', 'show' => true],
                                    ['label' => 'Observasi Bahaya', 'route' => 'observasi-bahaya.index', 'icon' => 'bi-binoculars', 'color' => '#d1893c', 'show' => $access['observasi-bahaya']],
                                    ['label' => 'Inspeksi K3', 'route' => 'inpeksik3.index', 'icon' => 'bi-clipboard2-check', 'color' => '#3f6ea6', 'show' => $access['inpeksik3']],
                                    ['label' => 'Pelatihan HSE', 'route' => 'pelatihanhse.index', 'icon' => 'bi-mortarboard', 'color' => '#6c4a9e', 'show' => $access['pelatihanhse']],
                                    ['label' => 'IBPR/HIRARC', 'route' => 'ibpr.index', 'icon' => 'bi-file-earmark-text', 'color' => '#7a2020', 'show' => $access['ibpr']],
                                    ['label' => 'Manajemen APD', 'route' => 'apd.index', 'icon' => 'bi-shield-check', 'color' => '#4a9d5f', 'show' => $access['apd']],
                                    ['label' => 'Register Dokumen', 'route' => 'dokumen.index', 'icon' => 'bi-folder2-open', 'color' => '#4a7ab5', 'show' => $access['dokumen']],
                                    ['label' => 'Tanggap Darurat', 'route' => 'tanggap-darurat.index', 'icon' => 'bi-telephone-forward', 'color' => '#d9614f', 'show' => $access['tanggap-darurat']],
                                    ['label' => 'Statistik HSE', 'route' => 'statistik.index', 'icon' => 'bi-graph-up-arrow', 'color' => '#0b5c3d', 'show' => $access['statistik']],
                                ];
                            @endphp
                            @foreach ($quickLinks as $link)
                                @if ($link['show'])
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="{{ route($link['route']) }}" class="text-decoration-none">
                                            <div class="d-flex flex-column align-items-center text-center p-3 rounded-3 h-100"
                                                style="background:{{ $link['color'] }}0d; transition: background .2s ease;"
                                                onmouseover="this.style.background='{{ $link['color'] }}22'"
                                                onmouseout="this.style.background='{{ $link['color'] }}0d'">
                                                <div class="d-flex align-items-center justify-content-center rounded-circle mb-2"
                                                    style="width:44px; height:44px; background:{{ $link['color'] }}; color:#fff;">
                                                    <i class="bi {{ $link['icon'] }}"></i>
                                                </div>
                                                <div class="small fw-semibold text-dark">{{ $link['label'] }}</div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->

            <!-- Right: role-specific widgets -->
            <div class="col-lg-4">

                @if ($access['pelatihanhse'])
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pelatihan Mendatang</h5>
                            @if ($pelatihanMendatang->isEmpty())
                                <p class="text-muted small mb-0">Tidak ada pelatihan yang dijadwalkan.</p>
                            @else
                                @foreach ($pelatihanMendatang as $pelatihan)
                                    <div class="d-flex justify-content-between align-items-start mb-2 pb-2 border-bottom">
                                        <div>
                                            <div class="fw-semibold small">{{ $pelatihan->nama_pelatihan }}</div>
                                            <div class="text-muted small">{{ $pelatihan->tanggal->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <a href="{{ route('pelatihanhse.index') }}" class="small">Lihat semua &rarr;</a>
                        </div>
                    </div>
                @endif

                @if ($access['tanggap-darurat'])
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kontak Darurat</h5>
                            @foreach ($kontakDarurat as $kontak)
                                @php $color = \App\Models\TanggapDarurat::KATEGORI_COLORS[$kontak->kategori] ?? '#6c757d'; @endphp
                                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                                    <div class="small fw-semibold">{{ $kontak->nama }}</div>
                                    <div class="fw-bold" style="color: {{ $color }};">{{ $kontak->nomor_telepon }}</div>
                                </div>
                            @endforeach
                            <a href="{{ route('tanggap-darurat.index') }}" class="small">Lihat semua &rarr;</a>
                        </div>
                    </div>
                @endif

                @if ($access['statistik'])
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statistik &amp; Analisis Risiko</h5>
                            <p class="small text-muted">Lihat FR/SR/IR, compliance inspeksi, dan distribusi risiko
                                secara lengkap.</p>
                            <a href="{{ route('statistik.index') }}" class="btn btn-sm btn-hse-outline"
                                style="border:1px solid #0b5c3d; color:#0b5c3d;">
                                <i class="bi bi-graph-up-arrow"></i> Buka Statistik HSE
                            </a>
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan</h5>
                        <div class="d-flex justify-content-between small mb-2">
                            <span class="text-muted">Karyawan Aktif</span>
                            <span class="fw-semibold">{{ $totalKaryawanAktif }}</span>
                        </div>
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Insiden Open</span>
                            <span class="fw-semibold">{{ $insidenOpenCount }}</span>
                        </div>
                    </div>
                </div>

            </div><!-- End Right side columns -->
        </div>

    </section>
@endsection
