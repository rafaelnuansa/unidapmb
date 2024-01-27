<!-- resources/views/admin/fakultas/edit.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4">Edit Fakultas</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Fakultas Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $fakultas->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="jenjang_id" class="form-label">Jenjang</label>
                        <select class="form-select" id="jenjang_id" name="jenjang_id">
                            @foreach ($jenjangs as $jenjang)
                                <option value="{{ $jenjang->id }}" @if(old('jenjang_id', $fakultas->jenjang_id) == $jenjang->id) selected @endif>{{ $jenjang->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Fakultas</button>
                    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Back to List</a>
                </form>
            </div>
        </div>
    </div>
@endsection
