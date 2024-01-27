@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Alternatif</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Alternatif</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Alternatif</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('alternatives.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Alternatif:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pilih Kriteria dan Sub Kriteria:</label>
                    @foreach ($criteria as $criterion)
                        <div class="mb-2">
                            <label for="criteria[{{ $criterion->id }}]" class="form-label">{{ $criterion->name }}</label>
                            <select name="criteria[{{ $criterion->id }}]" class="form-select" required>
                                <option value="" disabled selected>Pilih Subkriteria</option>
                                @foreach ($subcriteria->where('criteria_id', $criterion->id) as $subcriterion)
                                    <option value="{{ $criterion->id }}_{{ $subcriterion->id }}">{{ $subcriterion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('alternatives.index') }}" class="btn btn-light">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
