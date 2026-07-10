@extends('layouts.dashboard.template')

@section('title', 'Detail Laporan Insiden')

@php
    $statusBadge = App\DataTables\LaporanInsidenDataTable::STATUS_BADGES[$laporanInsiden->status] ?? 'bg-secondary';
    $statusLabel = App\Models\LaporanInsiden::STATUSES[$laporanInsiden->status] ?? ucfirst($laporanInsiden->status);
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Detail Laporan Insiden</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('laporan-insiden.index') }}">Laporan Insiden</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">{{ $laporanInsiden->no_laporan }}</h5>
                            <span class="badge rounded-pill {{ $statusBadge }}">{{ $statusLabel }}</span>
                        </div>

                        <dl class="row">
                            <dt class="col-sm-4">Jenis Insiden</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->jenis_insiden }}</dd>

                            <dt class="col-sm-4">Tanggal &amp; Waktu</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->tanggal->format('d-m-Y') }}
                                {{ $laporanInsiden->waktu }}</dd>

                            <dt class="col-sm-4">Lokasi</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->lokasi }}</dd>

                            <dt class="col-sm-4">Nama Korban</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->nama_korban }}</dd>

                            <dt class="col-sm-4">Jabatan</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->jabatan ?: '-' }}</dd>

                            <dt class="col-sm-4">Departemen</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->departemen ?: '-' }}</dd>

                            <dt class="col-sm-4">Hari Hilang</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->hari_hilang ?: '-' }}</dd>

                            <dt class="col-sm-4">Dilaporkan Oleh</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->user->name ?? '-' }}</dd>

                            <dt class="col-sm-4">Deskripsi Kejadian</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->deskripsi_kejadian ?: '-' }}</dd>

                            <dt class="col-sm-4">Penyebab Langsung</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->penyebab_langsung ?: '-' }}</dd>

                            <dt class="col-sm-4">Penyebab Dasar</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->penyebab_dasar ?: '-' }}</dd>

                            <dt class="col-sm-4">Tindakan Segera</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->tindakan_segera ?: '-' }}</dd>

                            <dt class="col-sm-4">Tindakan Perbaikan</dt>
                            <dd class="col-sm-8">{{ $laporanInsiden->tindakan_perbaikan ?: '-' }}</dd>
                        </dl>

                        <a href="{{ route('laporan-insiden.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        @if (in_array(auth()->user()->role, ['admin', 'hsemanger']))
                            <a href="{{ route('laporan-insiden.edit', $laporanInsiden) }}" class="btn btn-warning text-white">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
