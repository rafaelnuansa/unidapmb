@extends('layouts.app')

@section('content')
<x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />

<div class="row">
    <div class="col-lg-8">
        <div class="card card-animate">
            <div class="card-header">
                <div class="card-title">Data Wali</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('formulir.wali.store', $encryptRegistNumber) }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nama">Nama Wali</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $wali->nama ?? '' }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir Wali</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ $wali->tanggal_lahir ?? '' }}">
                    </div>

                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
