@extends('layouts.dashboard.template')

@section('title', 'Laporan Insiden')

@section('content')
    <div class="pagetitle">
        <h1>Laporan Insiden</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Laporan Insiden</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Laporan Insiden</h5>

                        <a href="{{ route('laporan-insiden.create') }}" class="btn btn-primary btn-sm mb-3">
                            <i class="bi bi-plus-lg"></i> Buat Laporan
                        </a>

                        <div class="table-responsive">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered align-middle', 'style' => 'width:100%']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    @if (app()->environment('production'))
        {!! str_replace('http:', 'https:', $dataTable->scripts()) !!}
    @else
        {!! $dataTable->scripts() !!}
    @endif
@endpush
