<!-- resources/views/admin/jurusans/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Add New Jurusan</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.jurusans.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenjang</label>
                            <select class="form-select" name="jenjang_id">
                                @foreach($jenjangs as $jenjang)
                                    <option value="{{ $jenjang->id }}">{{ $jenjang->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fakultas</label>
                            <select class="form-select" name="fakultas_id">
                                @foreach($fakultas as $fakulta)
                                    <option value="{{ $fakulta->id }}">{{ $fakulta->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add Jurusan</button>
                            <a href="{{ route('admin.jurusans.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
