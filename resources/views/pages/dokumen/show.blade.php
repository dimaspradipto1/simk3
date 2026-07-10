@extends('layouts.dashboard.template')

@section('title', 'Detail Dokumen')

@php
    $statusBadge = App\DataTables\DokumenDataTable::STATUS_BADGES[$dokumen->status] ?? 'bg-secondary';
    $statusLabel = App\Models\Dokumen::STATUS[$dokumen->status] ?? ucfirst($dokumen->status);
    $jenisLabel = App\Models\Dokumen::JENIS[$dokumen->jenis] ?? $dokumen->jenis;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Detail Dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dokumen.index') }}">Register Dokumen</a></li>
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
                            <h5 class="card-title mb-0">{{ $dokumen->nomor_dokumen }}</h5>
                            <span class="badge rounded-pill {{ $statusBadge }}">{{ $statusLabel }}</span>
                        </div>

                        @if ($dokumen->peringatan)
                            <div class="alert alert-warning d-flex align-items-center gap-2 py-2">
                                <i class="bi bi-exclamation-triangle-fill"></i> {{ $dokumen->peringatan }}
                            </div>
                        @endif

                        <dl class="row">
                            <dt class="col-sm-4">Jenis</dt>
                            <dd class="col-sm-8">{{ $jenisLabel }}</dd>

                            <dt class="col-sm-4">Judul Dokumen</dt>
                            <dd class="col-sm-8">{{ $dokumen->nama_dokumen }}</dd>

                            <dt class="col-sm-4">Versi</dt>
                            <dd class="col-sm-8">{{ $dokumen->versi ?: '-' }}</dd>

                            <dt class="col-sm-4">Pemilik Dokumen</dt>
                            <dd class="col-sm-8">{{ $dokumen->pemilik_dokumen ?: '-' }}</dd>

                            <dt class="col-sm-4">Tgl Efektif</dt>
                            <dd class="col-sm-8">{{ $dokumen->tanggal_efektif->format('d-m-Y') }}</dd>

                            <dt class="col-sm-4">Tgl Review</dt>
                            <dd class="col-sm-8">{{ $dokumen->tanggal_review ? $dokumen->tanggal_review->format('d-m-Y') : '-' }}</dd>

                            <dt class="col-sm-4">Link Dokumen</dt>
                            <dd class="col-sm-8">
                                @if ($dokumen->link_dokumen)
                                    <a href="{{ $dokumen->link_dokumen }}" target="_blank" rel="noopener">{{ $dokumen->link_dokumen }}</a>
                                @else
                                    -
                                @endif
                            </dd>
                        </dl>

                        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
