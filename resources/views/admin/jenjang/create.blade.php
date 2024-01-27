<!-- resources/views/admin/jenjang/create.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <h2 class="mb-4">Create Jenjang</h2>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jenjang.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Jenjang Name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Create Jenjang</button>
                            <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
