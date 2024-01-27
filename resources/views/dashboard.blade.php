@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 col-md-12 col-lg-12 mb-4">
            <div class="alert alert-success border-0 shadow-sm mb-0">Selamat Datang, <strong>Administrator</strong></div>
        </div>
        <div class="col-lg-12 registration-flow">
            <ul class="list-group">
                <li class="list-group-item">Lengkapi Profile</li>
                <li class="list-group-item">Pemilihan Jenjang Pendidikan / Strata</li>
                <li class="list-group-item">Pemilihan Jurusan Peminatan</li>
                <li class="list-group-item">Pembayaran Pendaftaran</li>
                <li class="list-group-item">Pengisian Formulir</li>
                <li class="list-group-item">Ujian Test Online</li>
            </ul>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="card profile-completeness">
                <div class="card-body">
                    <h5 class="card-title mb-0">Lengkapi Profile</h5>
                    <p class="text-muted">Proses Pelengkapan Informasi</p>
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100" style="width: {{ $completeness }}%;">
                            <div class="label">{{ $completeness }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
