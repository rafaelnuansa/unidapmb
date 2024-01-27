<!-- resources/views/admin/tahun/index.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <h2 class="mb-4">Tahun Akademik List</h2>
            <a href="{{ route('admin.tahun.create') }}" class="btn btn-primary mb-3">Add New Tahun Akademik</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    @if ($tahunAkademiks->isEmpty())
                        <p>No Tahun Akademik found.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahunAkademiks as $tahunAkademik)
                                    <tr>
                                        <td>{{ $tahunAkademik->id }}</td>
                                        <td>{{ $tahunAkademik->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.tahun.edit', $tahunAkademik->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.tahun.destroy', $tahunAkademik->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tahunAkademiks->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
