@extends('layouts.app')

@section('content')

<x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />

<div class="row">
    <div class="col-lg-8">
        <div class="card card-animate">
            <div class="card-header">
                <div class="card-title">Alamat</div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('formulir.alamat.store', $encryptRegistNumber) }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="jalan">Jalan</label>
                        <input type="text" class="form-control" id="jalan" name="jalan" value="{{ $alamat->first()->jalan ?? '' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $alamat->first()->rt ?? '' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $alamat->first()->rw ?? '' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="dusun">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" value="{{ $alamat->first()->dusun ?? '' }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="desa">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa" value="{{ $alamat->first()->desa ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
