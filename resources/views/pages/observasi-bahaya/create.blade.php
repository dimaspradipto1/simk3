@extends('layouts.dashboard.template')

@section('title', 'Tambah Observasi Bahaya')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Observasi Bahaya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('observasi-bahaya.index') }}">Observasi Bahaya</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Observasi Bahaya</h5>

                        <form method="POST" action="{{ route('observasi-bahaya.store') }}" class="row g-3">
                            @csrf

                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}" required autofocus>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control @error('lokasi') is-invalid @enderror"
                                    value="{{ old('lokasi') }}" required>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="deskripsi_bahaya" class="form-label">Deskripsi Bahaya</label>
                                <textarea name="deskripsi_bahaya" id="deskripsi_bahaya" rows="3"
                                    class="form-control @error('deskripsi_bahaya') is-invalid @enderror" required>{{ old('deskripsi_bahaya') }}</textarea>
                                @error('deskripsi_bahaya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kategori_bahaya" class="form-label">Kategori Bahaya</label>
                                <select name="kategori_bahaya" id="kategori_bahaya"
                                    class="form-select @error('kategori_bahaya') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach (\App\Models\ObservasiBahaya::KATEGORI_BAHAYA as $value => $label)
                                        <option value="{{ $value }}" @selected(old('kategori_bahaya') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_bahaya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tingkat_resiko" class="form-label">Tingkat Risiko</label>
                                <select name="tingkat_resiko" id="tingkat_resiko"
                                    class="form-select @error('tingkat_resiko') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Tingkat Risiko --</option>
                                    @foreach (\App\Models\ObservasiBahaya::RISK_LEVELS as $value => $label)
                                        <option value="{{ $value }}" @selected(old('tingkat_resiko') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('tingkat_resiko')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="pic" class="form-label">PIC</label>
                                <input type="text" name="pic" id="pic"
                                    class="form-control @error('pic') is-invalid @enderror"
                                    value="{{ old('pic') }}" required>
                                @error('pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="target_selesai" class="form-label">Target Selesai</label>
                                <input type="date" name="target_selesai" id="target_selesai"
                                    class="form-control @error('target_selesai') is-invalid @enderror"
                                    value="{{ old('target_selesai') }}" required>
                                @error('target_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="tindakan_perbaikan" class="form-label">Tindakan Perbaikan</label>
                                <textarea name="tindakan_perbaikan" id="tindakan_perbaikan" rows="3"
                                    class="form-control @error('tindakan_perbaikan') is-invalid @enderror">{{ old('tindakan_perbaikan') }}</textarea>
                                @error('tindakan_perbaikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('observasi-bahaya.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
