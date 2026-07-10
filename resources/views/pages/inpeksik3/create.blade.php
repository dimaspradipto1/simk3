@extends('layouts.dashboard.template')

@section('title', 'Tambah Inspeksi K3')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Inspeksi K3</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('inpeksik3.index') }}">Inspeksi K3</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Inspeksi K3</h5>

                        <form method="POST" action="{{ route('inpeksik3.store') }}" class="row g-3">
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

                            <div class="col-md-6">
                                <label for="jenis_inpeksi" class="form-label">Jenis Inspeksi</label>
                                <select name="jenis_inpeksi" id="jenis_inpeksi"
                                    class="form-select @error('jenis_inpeksi') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Jenis Inspeksi --</option>
                                    @foreach (\App\Models\Inpeksik3::JENIS_INPEKSI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('jenis_inpeksi') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_inpeksi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="inspektor" class="form-label">Inspektor</label>
                                <input type="text" name="inspektor" id="inspektor"
                                    class="form-control @error('inspektor') is-invalid @enderror"
                                    value="{{ old('inspektor') }}" required>
                                @error('inspektor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="skor" class="form-label">Skor</label>
                                <input type="number" name="skor" id="skor" min="0" max="100"
                                    class="form-control @error('skor') is-invalid @enderror"
                                    value="{{ old('skor') }}" required>
                                @error('skor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status_selesai" class="form-label">Status Selesai</label>
                                <select name="status_selesai" id="status_selesai"
                                    class="form-select @error('status_selesai') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    @foreach (\App\Models\Inpeksik3::STATUS_SELESAI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status_selesai') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="temuan" class="form-label">Temuan</label>
                                <textarea name="temuan" id="temuan" rows="3"
                                    class="form-control @error('temuan') is-invalid @enderror">{{ old('temuan') }}</textarea>
                                @error('temuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="rekomendasi" class="form-label">Rekomendasi</label>
                                <textarea name="rekomendasi" id="rekomendasi" rows="3"
                                    class="form-control @error('rekomendasi') is-invalid @enderror">{{ old('rekomendasi') }}</textarea>
                                @error('rekomendasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                                <textarea name="tindak_lanjut" id="tindak_lanjut" rows="3"
                                    class="form-control @error('tindak_lanjut') is-invalid @enderror">{{ old('tindak_lanjut') }}</textarea>
                                @error('tindak_lanjut')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('inpeksik3.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
