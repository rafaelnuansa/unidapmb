@extends('layouts.app')

@section('content')
<x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />
<div class="row">
    <div class="col-lg-8">
        <div class="card card-animate">
            <div class="card-header">
                <h5 class="card-title">Lampiran</h5>
            </div>
            <div class="card-body">
                @if ($lampiran)
                    <div class="mb-3">
                        <h5>Foto:</h5>
                        <img src="{{ asset('storage/' . $lampiran->foto) }}" alt="Foto" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <h5>Scan KTP:</h5>
                        <img src="{{ asset('storage/' . $lampiran->ktp) }}" alt="Scan KTP" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <h5>Scan Ijazah:</h5>
                        <img src="{{ asset('storage/' . $lampiran->ijazah) }}" alt="Scan Ijazah" class="img-fluid">
                    </div>
                @else
                    <p>Data lampiran belum diunggah.</p>
                @endif

                <form method="POST" action="{{ route('formulir.lampiran.store', $encryptRegistNumber) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="ktp" class="form-label">Scan KTP</label>
                        <input type="file" id="ktp" name="ktp" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="ijazah" class="form-label">Scan Ijazah</label>
                        <input type="file" id="ijazah" name="ijazah" class="form-control">
                    </div>

                    <!-- Tambahkan field lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
