@extends('layouts.dashboard.template')

@section('title', 'Tambah Karyawan')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Karyawan</h5>

                        <form method="POST" action="{{ route('karyawan.store') }}" class="row g-3">
                            @csrf

                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Karyawan</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}" required autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" id="nip"
                                    class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="departemen_id" class="form-label">Departemen</label>
                                <select name="departemen_id" id="departemen_id"
                                    class="form-select @error('departemen_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Departemen --</option>
                                    @foreach ($departemens as $departemen)
                                        <option value="{{ $departemen->id }}" @selected(old('departemen_id') == $departemen->id)>
                                            {{ $departemen->nama_departemen }}</option>
                                    @endforeach
                                </select>
                                @error('departemen_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan"
                                    class="form-control @error('jabatan') is-invalid @enderror"
                                    value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="no_hp" class="form-label">No. HP</label>
                                <input type="text" name="no_hp" id="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                    class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                    value="{{ old('tanggal_masuk') }}">
                                @error('tanggal_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3"
                                    class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" @checked(old('is_active', true))>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
