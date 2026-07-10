@extends('layouts.dashboard.template')

@section('title', 'Pelatihan HSE')

@section('content')
    <div class="pagetitle">
        <h1>Pelatihan HSE</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Pelatihan HSE</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pelatihan HSE</h5>

                        <a href="{{ route('pelatihanhse.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="bi bi-plus-lg"></i> Tambah Pelatihan
                        </a>

                        <div class="table-responsive">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered align-middle', 'style' => 'width:100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-confirm-delete-modal />
@endsection

@push('script')
    @if (app()->environment('production'))
        {!! str_replace('http:', 'https:', $dataTable->scripts()) !!}
    @else
        {!! $dataTable->scripts() !!}
    @endif
@endpush
