@extends('layouts.app')

@section('content')
<x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />

<div class="row">
    <div class="col-lg-12">
        <div class="card card-animate">
            <div class="card-header">
                <div class="card-title">Data Ibu</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('formulir.ibu.store', $encryptRegistNumber) }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nama">Nama Ibu</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $ibu->nama ?? '' }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nik">NIK Ibu</label>
                        <input type="text" id="nik" name="nik" class="form-control" value="{{ $ibu->nik ?? '' }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir Ibu</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ $ibu->tanggal_lahir ?? '' }}">
                    </div>

                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
