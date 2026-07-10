@extends('layouts.dashboard.template')

@section('title', 'Edit Departemen')

@section('content')
    <div class="pagetitle">
        <h1>Edit Departemen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('departemen.index') }}">Data Departemen</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Departemen</h5>

                        <form method="POST" action="{{ route('departemen.update', $departemen) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="nama_departemen" class="form-label">Nama Departemen</label>
                                <input type="text" name="nama_departemen" id="nama_departemen"
                                    class="form-control @error('nama_departemen') is-invalid @enderror"
                                    value="{{ old('nama_departemen', $departemen->nama_departemen) }}" required
                                    autofocus>
                                @error('nama_departemen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3"
                                    class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $departemen->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
