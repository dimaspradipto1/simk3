@extends('layouts.dashboard.template')

@section('title', 'Edit Identifikasi Risiko')

@section('content')
    <div class="pagetitle">
        <h1>Edit Identifikasi Risiko</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ibpr.index') }}">IBPR / HIRARC</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Identifikasi Risiko</h5>

                        <form method="POST" action="{{ route('ibpr.update', $ibpr) }}" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="aktivitas" class="form-label">Proses/Aktivitas *</label>
                                <input type="text" name="aktivitas" id="aktivitas"
                                    class="form-control @error('aktivitas') is-invalid @enderror"
                                    value="{{ old('aktivitas', $ibpr->aktivitas) }}" required autofocus>
                                @error('aktivitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="bahaya" class="form-label">Bahaya *</label>
                                <input type="text" name="bahaya" id="bahaya"
                                    class="form-control @error('bahaya') is-invalid @enderror"
                                    value="{{ old('bahaya', $ibpr->bahaya) }}" required>
                                @error('bahaya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="konsekuensi" class="form-label">Konsekuensi</label>
                                <input type="text" name="konsekuensi" id="konsekuensi"
                                    class="form-control @error('konsekuensi') is-invalid @enderror"
                                    value="{{ old('konsekuensi', $ibpr->konsekuensi) }}">
                                @error('konsekuensi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="pengendalian_saat_ini" class="form-label">Pengendalian Saat Ini</label>
                                <textarea name="pengendalian_saat_ini" id="pengendalian_saat_ini" rows="3"
                                    class="form-control @error('pengendalian_saat_ini') is-invalid @enderror">{{ old('pengendalian_saat_ini', $ibpr->pengendalian_saat_ini) }}</textarea>
                                @error('pengendalian_saat_ini')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="keparahan" class="form-label">Keparahan (S: 1-5)</label>
                                <input type="number" name="keparahan" id="keparahan" min="1" max="5"
                                    class="form-control @error('keparahan') is-invalid @enderror"
                                    value="{{ old('keparahan', $ibpr->keparahan) }}" required>
                                @error('keparahan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="kemungkinan" class="form-label">Kemungkinan (L: 1-5)</label>
                                <input type="number" name="kemungkinan" id="kemungkinan" min="1" max="5"
                                    class="form-control @error('kemungkinan') is-invalid @enderror"
                                    value="{{ old('kemungkinan', $ibpr->kemungkinan) }}" required>
                                @error('kemungkinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="hierarki" class="form-label">Hierarki Pengendalian</label>
                                <select name="hierarki" id="hierarki"
                                    class="form-select @error('hierarki') is-invalid @enderror">
                                    @foreach (\App\Models\Ibpr::HIERARKI as $value => $label)
                                        <option value="{{ $value }}" @selected(old('hierarki', $ibpr->hierarki) === $value)>
                                            {{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('hierarki')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="pic" class="form-label">PIC</label>
                                <input type="text" name="pic" id="pic"
                                    class="form-control @error('pic') is-invalid @enderror"
                                    value="{{ old('pic', $ibpr->pic) }}">
                                @error('pic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="pengendalian_tambahan" class="form-label">Pengendalian Tambahan</label>
                                <textarea name="pengendalian_tambahan" id="pengendalian_tambahan" rows="3"
                                    class="form-control @error('pengendalian_tambahan') is-invalid @enderror">{{ old('pengendalian_tambahan', $ibpr->pengendalian_tambahan) }}</textarea>
                                @error('pengendalian_tambahan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="batas_waktu" class="form-label">Batas Waktu</label>
                                <input type="date" name="batas_waktu" id="batas_waktu"
                                    class="form-control @error('batas_waktu') is-invalid @enderror"
                                    value="{{ old('batas_waktu', optional($ibpr->batas_waktu)->format('Y-m-d')) }}">
                                @error('batas_waktu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror" required>
                                    @foreach (\App\Models\Ibpr::STATUS as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status', $ibpr->status) === $value)>
                                            {{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 d-flex justify-content-end gap-2">
                                <a href="{{ route('ibpr.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
