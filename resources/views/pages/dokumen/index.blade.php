@extends('layouts.dashboard.template')

@section('title', 'Register Dokumen')

@section('content')
    <div class="pagetitle">
        <h1>Register Dokumen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Register Dokumen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Dokumen HSE</h5>

                        <button type="button" class="btn btn-primary btn-sm mb-3" id="btnTambahDokumen">
                            <i class="bi bi-plus-lg"></i> Tambah Dokumen
                        </button>

                        {{ $dataTable->table(['class' => 'table table-striped table-bordered align-middle', 'style' => 'width:100%']) }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah/Edit Dokumen -->
    <div class="modal fade" id="dokumenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="dokumenForm" method="POST" action="{{ route('dokumen.store') }}" data-mode="create">
                    @csrf
                    <input type="hidden" name="_method" id="_method_field" value="">
                    <input type="hidden" name="_dokumen_id" id="_dokumen_id" value="">

                    <div class="modal-header">
                        <h5 class="modal-title" id="dokumenModalLabel">Tambah Dokumen HSE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label for="nomor_dokumen" class="form-label">No. Dokumen *</label>
                            <input type="text" name="nomor_dokumen" id="nomor_dokumen"
                                class="form-control @error('nomor_dokumen') is-invalid @enderror"
                                value="{{ old('nomor_dokumen') }}" required>
                            @error('nomor_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select name="jenis" id="jenis" class="form-select @error('jenis') is-invalid @enderror">
                                @foreach (\App\Models\Dokumen::JENIS as $value => $label)
                                    <option value="{{ $value }}" @selected(old('jenis') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="nama_dokumen" class="form-label">Judul Dokumen *</label>
                            <input type="text" name="nama_dokumen" id="nama_dokumen"
                                class="form-control @error('nama_dokumen') is-invalid @enderror"
                                value="{{ old('nama_dokumen') }}" required>
                            @error('nama_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="versi" class="form-label">Versi</label>
                            <input type="text" name="versi" id="versi"
                                class="form-control @error('versi') is-invalid @enderror"
                                value="{{ old('versi') }}">
                            @error('versi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="pemilik_dokumen" class="form-label">Pemilik Dokumen</label>
                            <input type="text" name="pemilik_dokumen" id="pemilik_dokumen"
                                class="form-control @error('pemilik_dokumen') is-invalid @enderror"
                                value="{{ old('pemilik_dokumen') }}">
                            @error('pemilik_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tanggal_efektif" class="form-label">Tgl Efektif</label>
                            <input type="date" name="tanggal_efektif" id="tanggal_efektif"
                                class="form-control @error('tanggal_efektif') is-invalid @enderror"
                                value="{{ old('tanggal_efektif') }}">
                            @error('tanggal_efektif')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tanggal_review" class="form-label">Tgl Review</label>
                            <input type="date" name="tanggal_review" id="tanggal_review"
                                class="form-control @error('tanggal_review') is-invalid @enderror"
                                value="{{ old('tanggal_review') }}">
                            @error('tanggal_review')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                @foreach (\App\Models\Dokumen::STATUS as $value => $label)
                                    <option value="{{ $value }}" @selected(old('status') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-confirm-delete-modal />
@endsection

@push('script')
    @if (app()->environment('production'))
        {!! str_replace('http:', 'https:', $dataTable->scripts()) !!}
    @else
        {!! $dataTable->scripts() !!}
    @endif

    <script>
        const dokumenJenisPrefix = {
            sop: 'SOP',
            prosedur: 'PRO',
            formulir: 'FOR',
            kebijakan: 'POL',
            manual: 'MAN',
            instruksi_kerja: 'IK',
        };

        function resetDokumenModalForCreate() {
            const form = document.getElementById('dokumenForm');
            form.reset();
            form.action = '{{ route('dokumen.store') }}';
            form.dataset.mode = 'create';
            document.getElementById('_method_field').value = '';
            document.getElementById('_dokumen_id').value = '';
            document.getElementById('dokumenModalLabel').textContent = 'Tambah Dokumen HSE';
            document.getElementById('jenis').value = 'sop';
            document.getElementById('nomor_dokumen').value = 'HSE-SOP-';
            document.getElementById('versi').value = 'Rev.1';
            document.getElementById('status').value = 'aktif';
            document.getElementById('tanggal_efektif').value = new Date().toISOString().slice(0, 10);
            document.getElementById('tanggal_review').value = '';
        }

        document.getElementById('btnTambahDokumen').addEventListener('click', function () {
            resetDokumenModalForCreate();
            new bootstrap.Modal(document.getElementById('dokumenModal')).show();
        });

        document.getElementById('jenis').addEventListener('change', function () {
            const form = document.getElementById('dokumenForm');
            if (form.dataset.mode !== 'create') return;

            const nomorInput = document.getElementById('nomor_dokumen');
            const prefixPattern = /^HSE-[A-Z]+-$/;
            if (!nomorInput.value || prefixPattern.test(nomorInput.value)) {
                nomorInput.value = 'HSE-' + (dokumenJenisPrefix[this.value] || this.value.toUpperCase()) + '-';
            }
        });

        document.addEventListener('click', function (event) {
            const btn = event.target.closest('.btn-edit-dokumen');
            if (!btn) return;

            const form = document.getElementById('dokumenForm');
            form.reset();
            form.action = btn.dataset.url;
            form.dataset.mode = 'edit';
            document.getElementById('_method_field').value = 'PUT';
            document.getElementById('_dokumen_id').value = btn.dataset.id || '';
            document.getElementById('dokumenModalLabel').textContent = 'Edit Dokumen HSE';
            document.getElementById('nomor_dokumen').value = btn.dataset.nomor_dokumen || '';
            document.getElementById('jenis').value = btn.dataset.jenis || '';
            document.getElementById('nama_dokumen').value = btn.dataset.nama_dokumen || '';
            document.getElementById('versi').value = btn.dataset.versi || '';
            document.getElementById('pemilik_dokumen').value = btn.dataset.pemilik_dokumen || '';
            document.getElementById('tanggal_efektif').value = btn.dataset.tanggal_efektif || '';
            document.getElementById('tanggal_review').value = btn.dataset.tanggal_review || '';
            document.getElementById('status').value = btn.dataset.status || '';

            new bootstrap.Modal(document.getElementById('dokumenModal')).show();
        });

        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('dokumenForm');
                const dokumenId = @json(old('_dokumen_id'));

                form.dataset.mode = dokumenId ? 'edit' : 'create';
                document.getElementById('dokumenModalLabel').textContent = dokumenId ? 'Edit Dokumen HSE' : 'Tambah Dokumen HSE';

                if (dokumenId) {
                    form.action = '{{ url('dokumen') }}/' + dokumenId;
                    document.getElementById('_method_field').value = 'PUT';
                    document.getElementById('_dokumen_id').value = dokumenId;
                } else {
                    form.action = '{{ route('dokumen.store') }}';
                    document.getElementById('_method_field').value = '';
                }

                new bootstrap.Modal(document.getElementById('dokumenModal')).show();
            });
        @endif
    </script>
@endpush
