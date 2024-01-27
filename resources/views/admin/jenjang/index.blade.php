<!-- resources/views/admin/jenjang/index.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="row">
        <div class="col-12">

        <a href="{{ route('jenjang.create') }}" class="btn btn-primary mb-3">Add Jenjang</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenjangs as $jenjang)
                            <tr>
                                <td>{{ $jenjang->id }}</td>
                                <td>{{ $jenjang->name }}</td>
                                <td>
                                    <a href="{{ route('jenjang.edit', $jenjang->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('jenjang.destroy', $jenjang->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No jenjangs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection
