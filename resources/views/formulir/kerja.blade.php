@extends('layouts.app')

@section('content')

<x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />

<div class="row">
    <div class="col-lg-8">
        <div class="card card-animate">
            <div class="card-header">
                <div class="card-title">Status Kerja</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('formulir.kerja.store', $encryptRegistNumber) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="status_kerja">Status Kerja</label>
                        <select class="form-control" id="status_kerja" name="status_kerja">
                            <option value="1">Sedang Bekerja</option>
                            <option value="0">Tidak Bekerja</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat_kerja">Alamat Kerja</label>
                        <textarea class="form-control" id="alamat_kerja" name="alamat_kerja" rows="3"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kota_kerja">Kota Kerja</label>
                        <input type="text" class="form-control" id="kota_kerja" name="kota_kerja">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
