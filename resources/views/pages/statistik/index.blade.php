@extends('layouts.dashboard.template')

@section('title', 'Statistik HSE')

@section('content')
    <div class="pagetitle">
        <h1>Statistik HSE</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Statistik HSE</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @php
            $statCards = [
                ['label' => 'Frequency Rate (FR)', 'value' => number_format($fr, 2), 'sub' => 'LTI/1jt jam kerja', 'bg' => '#3f6ea6'],
                ['label' => 'Severity Rate (SR)', 'value' => number_format($sr, 2), 'sub' => 'Hari hilang/1jt jam', 'bg' => '#b6452f'],
                ['label' => 'Incident Rate (IR)', 'value' => number_format($ir, 2), 'sub' => 'Per 200rb jam (OSHA)', 'bg' => '#d1893c'],
                ['label' => 'Compliance Inspeksi', 'value' => $complianceInspeksi . '%', 'sub' => "{$inspeksiSelesai}/{$inspeksiTotal} selesai", 'bg' => '#4a9d5f'],
                ['label' => 'Rata Nilai Pelatihan', 'value' => $rataNilaiPelatihan . '%', 'sub' => "{$jumlahSesiPelatihan} sesi", 'bg' => '#6c4a9e'],
                ['label' => 'Risiko Ekstrem', 'value' => $risikoEkstrem, 'sub' => 'Perlu prioritas', 'bg' => '#7a2020'],
            ];
        @endphp

        <div class="row g-3 mb-1">
            @foreach ($statCards as $stat)
                <div class="col-md-4 col-lg-2">
                    <div class="card text-white h-100" style="background:{{ $stat['bg'] }}; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,.12);">
                        <div class="card-body" style="padding:1.1rem 1.25rem;">
                            <div class="small mb-2">{{ $stat['label'] }}</div>
                            <div class="fs-3 fw-bold mb-1 lh-1">{{ $stat['value'] }}</div>
                            <div class="small opacity-75">{{ $stat['sub'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-3">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bar-chart-fill text-primary"></i> Distribusi Jenis
                            Insiden</h5>
                        <div id="chartJenisInsiden"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bar-chart-fill text-primary"></i> Skor Inspeksi per
                            Area</h5>
                        <div id="chartSkorInspeksi"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bar-chart-fill text-primary"></i> Status Observasi
                            Bahaya</h5>
                        <div id="chartStatusObservasi"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-bar-chart-fill text-primary"></i> Distribusi Tingkat
                            Risiko (IBPR)</h5>
                        <div id="chartTingkatRisiko"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new ApexCharts(document.querySelector('#chartJenisInsiden'), {
                series: @json(array_values($distribusiInsiden)),
                labels: @json(array_keys($distribusiInsiden)),
                chart: { height: 320, type: 'donut' },
                colors: ['#7a2020', '#d9614f', '#d1893c', '#4a9d5f'],
                legend: { position: 'right' },
            }).render();

            new ApexCharts(document.querySelector('#chartSkorInspeksi'), {
                series: [{ name: 'Rata Skor', data: @json($skorPerAreaChart) }],
                chart: { height: 320, type: 'bar', toolbar: { show: false } },
                plotOptions: { bar: { columnWidth: '55%', borderRadius: 4 } },
                dataLabels: { enabled: false },
                yaxis: { max: 100 },
            }).render();

            new ApexCharts(document.querySelector('#chartStatusObservasi'), {
                series: @json(array_values($statusObservasi)),
                labels: @json(array_keys($statusObservasi)),
                chart: { height: 320, type: 'pie' },
                colors: ['#c0392b', '#d68910', '#27ae60'],
                legend: { position: 'bottom' },
            }).render();

            new ApexCharts(document.querySelector('#chartTingkatRisiko'), {
                series: [{ name: 'Jumlah', data: @json($tingkatRisikoChart) }],
                chart: { height: 320, type: 'bar', toolbar: { show: false } },
                plotOptions: { bar: { columnWidth: '45%', borderRadius: 4 } },
                dataLabels: { enabled: false },
            }).render();
        });
    </script>
@endpush
