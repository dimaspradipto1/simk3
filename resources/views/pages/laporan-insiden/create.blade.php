@extends('layouts.dashboard.template')

@section('title', 'Buat Laporan Insiden')

@section('content')
    <div class="pagetitle">
        <h1>Buat Laporan Insiden</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('laporan-insiden.index') }}">Laporan Insiden</a></li>
                <li class="breadcrumb-item active">Buat Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Laporan Insiden</h5>

                        <form method="POST" action="{{ route('laporan-insiden.store') }}" class="row g-3">
                            @csrf

                            <div class="col-md-6">
                                <label for="jenis_insiden" class="form-label">Jenis Insiden</label>
                                <input type="text" name="jenis_insiden" id="jenis_insiden"
                                    class="form-control @error('jenis_insiden') is-invalid @enderror"
                                    value="{{ old('jenis_insiden') }}" required autofocus>
                                @error('jenis_insiden')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" name="waktu" id="waktu"
                                    class="form-control @error('waktu') is-invalid @enderror"
                                    value="{{ old('waktu') }}" required>
                                @error('waktu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control @error('lokasi') is-invalid @enderror"
                                    value="{{ old('lokasi') }}" required>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nama_korban" class="form-label">Nama Korban</label>
                                <input type="text" name="nama_korban" id="nama_korban"
                                    class="form-control @error('nama_korban') is-invalid @enderror"
                                    value="{{ old('nama_korban') }}" required>
                                @error('nama_korban')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan"
                                    class="form-control @error('jabatan') is-invalid @enderror"
                                    value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="departemen" class="form-label">Departemen</label>
                                <input type="text" name="departemen" id="departemen"
                                    class="form-control @error('departemen') is-invalid @enderror"
                                    value="{{ old('departemen') }}">
                                @error('departemen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="hari_hilang" class="form-label">Hari Hilang</label>
                                <input type="text" name="hari_hilang" id="hari_hilang"
                                    class="form-control @error('hari_hilang') is-invalid @enderror"
                                    value="{{ old('hari_hilang') }}">
                                @error('hari_hilang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
                                <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows="3"
                                    class="form-control @error('deskripsi_kejadian') is-invalid @enderror">{{ old('deskripsi_kejadian') }}</textarea>
                                @error('deskripsi_kejadian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="penyebab_langsung" class="form-label">Penyebab Langsung</label>
                                <textarea name="penyebab_langsung" id="penyebab_langsung" rows="3"
                                    class="form-control @error('penyebab_langsung') is-invalid @enderror">{{ old('penyebab_langsung') }}</textarea>
                                @error('penyebab_langsung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="penyebab_dasar" class="form-label">Penyebab Dasar</label>
                                <textarea name="penyebab_dasar" id="penyebab_dasar" rows="3"
                                    class="form-control @error('penyebab_dasar') is-invalid @enderror">{{ old('penyebab_dasar') }}</textarea>
                                @error('penyebab_dasar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tindakan_segera" class="form-label">Tindakan Segera</label>
                                <textarea name="tindakan_segera" id="tindakan_segera" rows="3"
                                    class="form-control @error('tindakan_segera') is-invalid @enderror">{{ old('tindakan_segera') }}</textarea>
                                @error('tindakan_segera')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
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
                                <a href="{{ route('laporan-insiden.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
