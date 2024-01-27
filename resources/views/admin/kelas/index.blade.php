<!-- resources/views/admin/kelas/index.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
<div class="row">

    <div class="col-12">
        <h2 class="mb-4">Kelas List</h2>
        <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary mb-3">Add New Kelas</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classes as $class)
                                <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->code }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.kelas.edit', $class->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.kelas.destroy', $class->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No kelas found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
