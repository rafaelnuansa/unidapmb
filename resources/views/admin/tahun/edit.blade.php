<!-- resources/views/admin/tahun/edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <h2 class="mb-4">Edit Tahun Akademik</h2>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.tahun.update', $tahunAkademik->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tahun Akademik Name" value="{{ old('name', $tahunAkademik->name) }}">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Tahun Akademik</button>
                            <a href="{{ route('admin.tahun.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
