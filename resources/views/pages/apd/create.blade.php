@extends('layouts.dashboard.template')

@section('title', 'Tambah APD')

@section('content')
    <div class="pagetitle">
        <h1>Tambah APD</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('apd.index') }}">Manajemen APD</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah APD</h5>

                        <form method="POST" action="{{ route('apd.store') }}" class="row g-3">
                            @csrf

                            <div class="col-md-6">
                                <label for="jenis_apd" class="form-label">Jenis APD</label>
                                <input type="text" name="jenis_apd" id="jenis_apd"
                                    class="form-control @error('jenis_apd') is-invalid @enderror"
                                    value="{{ old('jenis_apd') }}" required autofocus>
                                @error('jenis_apd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="merek" class="form-label">Merek/Model</label>
                                <input type="text" name="merek" id="merek"
                                    class="form-control @error('merek') is-invalid @enderror"
                                    value="{{ old('merek') }}" required>
                                @error('merek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="jumlah_tersedia" class="form-label">Jumlah Tersedia</label>
                                <input type="number" name="jumlah_tersedia" id="jumlah_tersedia" min="0"
                                    class="form-control @error('jumlah_tersedia') is-invalid @enderror"
                                    value="{{ old('jumlah_tersedia') }}" required>
                                @error('jumlah_tersedia')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="jumlah_dibutuhkan" class="form-label">Jumlah Dibutuhkan</label>
                                <input type="number" name="jumlah_dibutuhkan" id="jumlah_dibutuhkan" min="0"
                                    class="form-control @error('jumlah_dibutuhkan') is-invalid @enderror"
                                    value="{{ old('jumlah_dibutuhkan') }}" required>
                                @error('jumlah_dibutuhkan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="kondisi" class="form-label">Kondisi</label>
                                <select name="kondisi" id="kondisi"
                                    class="form-select @error('kondisi') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Kondisi --</option>
                                    @foreach (\App\Models\Apd::KONDISI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('kondisi') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_beli" class="form-label">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" id="tanggal_beli"
                                    class="form-control @error('tanggal_beli') is-invalid @enderror"
                                    value="{{ old('tanggal_beli') }}" required>
                                @error('tanggal_beli')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="masa_pakai" class="form-label">Masa Pakai (bulan)</label>
                                <input type="number" name="masa_pakai" id="masa_pakai" min="1"
                                    class="form-control @error('masa_pakai') is-invalid @enderror"
                                    value="{{ old('masa_pakai') }}" required>
                                @error('masa_pakai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('apd.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
