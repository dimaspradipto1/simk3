@extends('layouts.dashboard.template')

@section('title', 'Tanggap Darurat')

@section('content')
    <div class="pagetitle">
        <h1>Tanggap Darurat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Tanggap Darurat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row mb-3 g-2">
            <div class="col">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute text-muted"
                        style="left: 14px; top: 50%; transform: translateY(-50%);"></i>
                    <input type="text" id="searchKontak" class="form-control ps-5"
                        placeholder="Cari nama, kategori...">
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success" id="btnTambahKontak">
                    <i class="bi bi-plus-lg"></i> Tambah Kontak
                </button>
            </div>
        </div>

        <div class="row g-3" id="kontakGrid">
            @forelse ($kontaks as $kontak)
                @php $color = \App\Models\TanggapDarurat::KATEGORI_COLORS[$kontak->kategori] ?? '#6c757d'; @endphp
                <div class="col-md-6 col-lg-3 kontak-card" data-search="{{ mb_strtolower($kontak->nama . ' ' . (\App\Models\TanggapDarurat::KATEGORI[$kontak->kategori] ?? $kontak->kategori)) }}">
                    <div class="card h-100 border-0 shadow-sm" style="border-left: 4px solid {{ $color }} !important; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                        <div class="card-body p-3 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                <h6 class="fw-bold mb-0">{{ $kontak->nama }}</h6>
                                <span class="badge rounded-pill fw-semibold flex-shrink-0"
                                    style="background-color: {{ $color }}1a; color: {{ $color }}; white-space: nowrap;">
                                    {{ \App\Models\TanggapDarurat::KATEGORI[$kontak->kategori] ?? $kontak->kategori }}
                                </span>
                            </div>

                            <div class="fs-4 fw-bold mb-1 lh-1" style="color: {{ $color }};">{{ $kontak->nomor_telepon }}</div>

                            @if ($kontak->jam_operasional)
                                <div class="d-flex align-items-center gap-1 text-muted small mb-2">
                                    <i class="bi bi-clock"></i> <span>{{ $kontak->jam_operasional }}</span>
                                </div>
                            @endif

                            @if ($kontak->catatan)
                                <p class="small text-body-secondary mb-3">{{ $kontak->catatan }}</p>
                            @endif

                            <div class="d-flex gap-2 mt-auto pt-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary flex-fill btn-edit-kontak"
                                    data-id="{{ $kontak->id }}"
                                    data-url="{{ route('tanggap-darurat.update', $kontak->id) }}"
                                    data-nama="{{ $kontak->nama }}" data-nomor_telepon="{{ $kontak->nomor_telepon }}"
                                    data-jam_operasional="{{ $kontak->jam_operasional }}"
                                    data-kategori="{{ $kontak->kategori }}" data-catatan="{{ $kontak->catatan }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-danger flex-fill btn-delete"
                                    data-url="{{ route('tanggap-darurat.destroy', $kontak->id) }}"
                                    data-name="{{ $kontak->nama }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info mb-0">Belum ada kontak darurat.</div>
                </div>
            @endforelse
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title mb-3">🚨 Prosedur Tanggap Darurat Cepat</h5>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 h-100" style="background:#fff8e1; border-left:4px solid #fd7e14; border-radius:.375rem;">
                            <h6 class="fw-bold mb-2">🔥 Kebakaran</h6>
                            <ol class="mb-0 ps-3 small">
                                <li>Bunyikan alarm</li>
                                <li>Evakuasi semua</li>
                                <li>Hubungi 113</li>
                                <li>Gunakan APAR</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 h-100" style="background:#fff8e1; border-left:4px solid #6f42c1; border-radius:.375rem;">
                            <h6 class="fw-bold mb-2">🩹 Kecelakaan</h6>
                            <ol class="mb-0 ps-3 small">
                                <li>Amankan area</li>
                                <li>Berikan P3K</li>
                                <li>Hubungi 118</li>
                                <li>Laporkan HSE</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 h-100" style="background:#fff8e1; border-left:4px solid #a0522d; border-radius:.375rem;">
                            <h6 class="fw-bold mb-2">☣️ Tumpahan Kimia</h6>
                            <ol class="mb-0 ps-3 small">
                                <li>Evakuasi 10m</li>
                                <li>Pakai APD kimia</li>
                                <li>Gunakan spill kit</li>
                                <li>Laporkan HSE</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 h-100" style="background:#fff8e1; border-left:4px solid #495057; border-radius:.375rem;">
                            <h6 class="fw-bold mb-2">🌋 Gempa Bumi</h6>
                            <ol class="mb-0 ps-3 small">
                                <li>Duck-Cover-Hold</li>
                                <li>Jauhi jendela</li>
                                <li>Tunggu selesai</li>
                                <li>Evakuasi ke titik kumpul</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah/Edit Kontak Darurat -->
    <div class="modal fade" id="kontakModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="kontakForm" method="POST" action="{{ route('tanggap-darurat.store') }}" data-mode="create">
                    @csrf
                    <input type="hidden" name="_method" id="_method_field" value="">
                    <input type="hidden" name="_kontak_id" id="_kontak_id" value="">

                    <div class="modal-header">
                        <h5 class="modal-title" id="kontakModalLabel">Tambah Kontak Darurat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="nama" class="form-label">Nama *</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon *</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon"
                                class="form-control @error('nomor_telepon') is-invalid @enderror"
                                value="{{ old('nomor_telepon') }}" required>
                            @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="jam_operasional" class="form-label">Jam Operasional</label>
                            <input type="text" name="jam_operasional" id="jam_operasional"
                                class="form-control @error('jam_operasional') is-invalid @enderror"
                                value="{{ old('jam_operasional') }}">
                            @error('jam_operasional')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori"
                                class="form-select @error('kategori') is-invalid @enderror">
                                @foreach (\App\Models\TanggapDarurat::KATEGORI as $value => $label)
                                    <option value="{{ $value }}" @selected(old('kategori') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea name="catatan" id="catatan" rows="3"
                                class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                            @error('catatan')
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
    <script>
        function resetKontakModalForCreate() {
            const form = document.getElementById('kontakForm');
            form.reset();
            form.action = '{{ route('tanggap-darurat.store') }}';
            form.dataset.mode = 'create';
            document.getElementById('_method_field').value = '';
            document.getElementById('_kontak_id').value = '';
            document.getElementById('kontakModalLabel').textContent = 'Tambah Kontak Darurat';
            document.getElementById('jam_operasional').value = '24 jam';
            document.getElementById('kategori').value = 'emergency_medical';
        }

        document.getElementById('btnTambahKontak').addEventListener('click', function () {
            resetKontakModalForCreate();
            new bootstrap.Modal(document.getElementById('kontakModal')).show();
        });

        document.addEventListener('click', function (event) {
            const btn = event.target.closest('.btn-edit-kontak');
            if (!btn) return;

            const form = document.getElementById('kontakForm');
            form.reset();
            form.action = btn.dataset.url;
            form.dataset.mode = 'edit';
            document.getElementById('_method_field').value = 'PUT';
            document.getElementById('_kontak_id').value = btn.dataset.id || '';
            document.getElementById('kontakModalLabel').textContent = 'Edit Kontak Darurat';
            document.getElementById('nama').value = btn.dataset.nama || '';
            document.getElementById('nomor_telepon').value = btn.dataset.nomor_telepon || '';
            document.getElementById('jam_operasional').value = btn.dataset.jam_operasional || '';
            document.getElementById('kategori').value = btn.dataset.kategori || '';
            document.getElementById('catatan').value = btn.dataset.catatan || '';

            new bootstrap.Modal(document.getElementById('kontakModal')).show();
        });

        document.getElementById('searchKontak').addEventListener('keyup', function () {
            const query = this.value.trim().toLowerCase();
            document.querySelectorAll('#kontakGrid .kontak-card').forEach(function (card) {
                card.style.display = card.dataset.search.includes(query) ? '' : 'none';
            });
        });

        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('kontakForm');
                const kontakId = @json(old('_kontak_id'));

                form.dataset.mode = kontakId ? 'edit' : 'create';
                document.getElementById('kontakModalLabel').textContent = kontakId ? 'Edit Kontak Darurat' : 'Tambah Kontak Darurat';

                if (kontakId) {
                    form.action = '{{ url('tanggap-darurat') }}/' + kontakId;
                    document.getElementById('_method_field').value = 'PUT';
                    document.getElementById('_kontak_id').value = kontakId;
                } else {
                    form.action = '{{ route('tanggap-darurat.store') }}';
                    document.getElementById('_method_field').value = '';
                }

                new bootstrap.Modal(document.getElementById('kontakModal')).show();
            });
        @endif
    </script>
@endpush
