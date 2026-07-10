@extends('layouts.dashboard.template')

@section('title', 'Tambah Pelatihan HSE')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Pelatihan HSE</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pelatihanhse.index') }}">Pelatihan HSE</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Pelatihan HSE</h5>

                        <form method="POST" action="{{ route('pelatihanhse.store') }}" class="row g-3">
                            @csrf

                            <div class="col-md-8">
                                <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                                <input type="text" name="nama_pelatihan" id="nama_pelatihan"
                                    class="form-control @error('nama_pelatihan') is-invalid @enderror"
                                    value="{{ old('nama_pelatihan') }}" required autofocus>
                                @error('nama_pelatihan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori"
                                    class="form-select @error('kategori') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach (\App\Models\Pelatihanhse::KATEGORI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('kategori') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="durasi" class="form-label">Durasi</label>
                                <input type="text" name="durasi" id="durasi" placeholder="Contoh: 2 hari"
                                    class="form-control @error('durasi') is-invalid @enderror"
                                    value="{{ old('durasi') }}" required>
                                @error('durasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                <input type="number" name="jumlah_peserta" id="jumlah_peserta" min="0"
                                    class="form-control @error('jumlah_peserta') is-invalid @enderror"
                                    value="{{ old('jumlah_peserta') }}" required>
                                @error('jumlah_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="instruktur" class="form-label">Instruktur</label>
                                <input type="text" name="instruktur" id="instruktur"
                                    class="form-control @error('instruktur') is-invalid @enderror"
                                    value="{{ old('instruktur') }}" required>
                                @error('instruktur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kelas" class="form-label">Metode</label>
                                <select name="kelas" id="kelas"
                                    class="form-select @error('kelas') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Metode --</option>
                                    @foreach (\App\Models\Pelatihanhse::METODE as $value => $label)
                                        <option value="{{ $value }}" @selected(old('kelas') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="nilai_evaluasi" class="form-label">Nilai Evaluasi</label>
                                <input type="number" name="nilai_evaluasi" id="nilai_evaluasi" min="0" max="100"
                                    class="form-control @error('nilai_evaluasi') is-invalid @enderror"
                                    value="{{ old('nilai_evaluasi') }}" required>
                                @error('nilai_evaluasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="sertifikat" class="form-label">Sertifikasi</label>
                                <select name="sertifikat" id="sertifikat"
                                    class="form-select @error('sertifikat') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    @foreach (\App\Models\Pelatihanhse::SERTIFIKASI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('sertifikat') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    @foreach (\App\Models\Pelatihanhse::STATUS as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="link_sertifikat" class="form-label">Link Sertifikat</label>
                                <input type="text" name="link_sertifikat" id="link_sertifikat"
                                    class="form-control @error('link_sertifikat') is-invalid @enderror"
                                    value="{{ old('link_sertifikat') }}">
                                @error('link_sertifikat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('pelatihanhse.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
