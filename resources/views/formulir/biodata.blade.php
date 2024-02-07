@extends('layouts.app')

@section('content')
    <x-formulir-nav :encryptRegistNumber="$encryptRegistNumber" />
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card card-animate">
                <div class="card-header">
                    <div class="card-title">Biodata</div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('formulir.biodata.store', $encryptRegistNumber) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" @if($biodata && $biodata->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($biodata && $biodata->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $biodata ? $biodata->tanggal_lahir : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $biodata ? $biodata->tempat_lahir : '' }}" required>
                        </div>
                        <!-- Tambahkan field lainnya sesuai kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan dan Lanjutkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
