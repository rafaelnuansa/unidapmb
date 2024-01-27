<!-- resources/views/admin/jurusans/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Jurusans List</h2>
            <a href="{{ route('admin.jurusans.create') }}" class="btn btn-primary mb-3">Add New Jurusan</a>

            @if(session('success'))
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
                                    <th>Name</th>
                                    <th>Jenjang</th>
                                    <th>Fakultas</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jurusans as $jurusan)
                                    <tr>
                                        <td>{{ $jurusan->id }}</td>
                                        <td>{{ $jurusan->name }}</td>
                                        <td>{{ $jurusan->jenjang_id }}</td> <!-- You may want to display the actual jenjang name -->
                                        <td>{{ $jurusan->fakultas_id }}</td> <!-- You may want to display the actual fakultas name -->
                                        <td>
                                            <a href="{{ route('admin.jurusans.edit', $jurusan->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.jurusans.destroy', $jurusan->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No jurusans found.</td>
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
