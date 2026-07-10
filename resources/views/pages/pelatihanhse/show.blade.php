@extends('layouts.dashboard.template')

@section('title', 'Detail Pelatihan HSE')

@php
    $statusBadge = App\DataTables\PelatihanhseDataTable::STATUS_BADGES[$pelatihanhse->status] ?? 'bg-secondary';
    $statusLabel = App\Models\Pelatihanhse::STATUS[$pelatihanhse->status] ?? ucfirst($pelatihanhse->status);
    $kategoriLabel = App\Models\Pelatihanhse::KATEGORI[$pelatihanhse->kategori] ?? $pelatihanhse->kategori;
    $metodeLabel = App\Models\Pelatihanhse::METODE[$pelatihanhse->kelas] ?? $pelatihanhse->kelas;
    $sertifikasiLabel = App\Models\Pelatihanhse::SERTIFIKASI[$pelatihanhse->sertifikat] ?? $pelatihanhse->sertifikat;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Detail Pelatihan HSE</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pelatihanhse.index') }}">Pelatihan HSE</a></li>
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
                            <h5 class="card-title mb-0">{{ $pelatihanhse->nama_pelatihan }}</h5>
                            <span class="badge rounded-pill {{ $statusBadge }}">{{ $statusLabel }}</span>
                        </div>

                        <dl class="row">
                            <dt class="col-sm-4">Kategori</dt>
                            <dd class="col-sm-8">{{ $kategoriLabel }}</dd>

                            <dt class="col-sm-4">Tanggal</dt>
                            <dd class="col-sm-8">{{ $pelatihanhse->tanggal->format('d-m-Y') }}</dd>

                            <dt class="col-sm-4">Durasi</dt>
                            <dd class="col-sm-8">{{ $pelatihanhse->durasi }}</dd>

                            <dt class="col-sm-4">Jumlah Peserta</dt>
                            <dd class="col-sm-8">{{ $pelatihanhse->jumlah_peserta }}</dd>

                            <dt class="col-sm-4">Instruktur</dt>
                            <dd class="col-sm-8">{{ $pelatihanhse->instruktur }}</dd>

                            <dt class="col-sm-4">Metode</dt>
                            <dd class="col-sm-8">{{ $metodeLabel }}</dd>

                            <dt class="col-sm-4">Nilai Evaluasi</dt>
                            <dd class="col-sm-8">{{ $pelatihanhse->nilai_evaluasi }}</dd>

                            <dt class="col-sm-4">Sertifikasi</dt>
                            <dd class="col-sm-8">{{ $sertifikasiLabel }}</dd>

                            <dt class="col-sm-4">Link Sertifikat</dt>
                            <dd class="col-sm-8">
                                @if ($pelatihanhse->link_sertifikat)
                                    <a href="{{ $pelatihanhse->link_sertifikat }}" target="_blank" rel="noopener">{{ $pelatihanhse->link_sertifikat }}</a>
                                @else
                                    -
                                @endif
                            </dd>
                        </dl>

                        <a href="{{ route('pelatihanhse.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('pelatihanhse.edit', $pelatihanhse) }}" class="btn btn-warning text-white">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
