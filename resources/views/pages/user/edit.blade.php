@extends('layouts.dashboard.template')

@section('title', 'Edit Pengguna')

@php
    $roles = [
        'admin' => 'Admin',
        'hsemanger' => 'HSE Manager',
        'supervisor' => 'Supervisor',
        'karyawan' => 'Karyawan',
        'kontraktor' => 'Kontraktor',
        'paramedis' => 'Paramedis',
        'timtanggapdarurat' => 'Tim Tanggap Darurat',
        'direksi' => 'Direksi',
        'auditor' => 'Auditor',
    ];
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Edit Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Manajemen Pengguna</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Pengguna</h5>

                        <form method="POST" action="{{ route('user.update', $user) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="role" class="form-label">Hak Akses</label>
                                <select name="role" id="role"
                                    class="form-select @error('role') is-invalid @enderror" required>
                                    @foreach ($roles as $value => $label)
                                        <option value="{{ $value }}" @selected(old('role', $user->role) === $value)>
                                            {{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="is_active" @checked(old('is_active', $user->is_active))>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
