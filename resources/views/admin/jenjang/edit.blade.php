<!-- resources/views/admin/jenjang/edit.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Jenjang Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $jenjang->name) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Jenjang</button>
                        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
