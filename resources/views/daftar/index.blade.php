@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Pendaftaran</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-12 mb-2">
                    <a class="btn btn-md btn-success border-0 shadow w-100" type="button" href="{{ route('daftar.form') }}">
                        <i class="fa fa-plus-circle me-2"></i>Daftar Baru
                    </a>
                </div>
                <div class="col-md-9 col-12 mb-2">
                    <form action="{{ route('daftar.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-0 shadow-sm" placeholder="Cari Nomor Registrasi" name="search" value="{{ request('search') }}">
                            <input type="date" class="form-control border-0 shadow-sm" placeholder="Start Date" name="start_date" value="{{ request('start_date') }}">
                            <input type="date" class="form-control border-0 shadow-sm" placeholder="End Date" name="end_date" value="{{ request('end_date') }}">
                            <button type="submit" class="btn btn-dark">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                    </path>
                                </svg>
                            </button>
                            @if(request('search') || request('start_date') || request('end_date'))
                        <a href="{{ route('daftar.index') }}" class="btn btn-dark">Reset</a>
                    @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 mb-4">
        <div class="col-12">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Pendaftaran</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table id="dataTable" class="table align-middle table-nowrap mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 10%;">No.</th>
                                    <th>Registration Number</th>
                                    <th>Periode</th>
                                    <th>Jurusan Pilihan</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $index => $registration)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td><b>{{ $registration->nomor_registrasi }}</b></td>
                                        <td><b>{{ $registration->periode->name }}</b></td>
                                        <td>
                                            <ul>
                                                <li>{{ $registration->jurusan1->name }}</li>
                                                <li>{{ $registration->jurusan2->name }}</li>
                                                <li>{{ $registration->jurusan3->name }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ $registration->kelas->name }}</td>
                                        <td>{{ $registration->created_at->format('d F Y') }}</td>
                                        <td>{{ $registration->is_verified ? 'Terverifikasi' : 'Belum Terverifikasi' }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm me-2"
                                                href="{{ route('daftar.edit', $registration->id) }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav>
                        {{ $registrations->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
