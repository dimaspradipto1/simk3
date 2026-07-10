@extends('layouts.dashboard.template')

@section('title', 'Ubah Password Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Ubah Password Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Manajemen Pengguna</a></li>
                <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Password &mdash; {{ $user->name }}</h5>

                        <form method="POST" action="{{ route('user.updatePassword', $user) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="password" class="form-label">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        autofocus>
                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                        data-target="#password" tabindex="-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password
                                    Baru</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                        data-target="#password_confirmation" tabindex="-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-key"></i> Simpan Password
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
