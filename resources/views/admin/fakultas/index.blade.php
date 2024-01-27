<!-- resources/views/admin/fakultas/index.blade.php -->

@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">

            <a href="{{ route('admin.fakultas.create') }}" class="btn btn-primary mb-3">Add New Fakultas</a>
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Jenjang</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fakultasList as $fakultas)
                                    <tr>
                                        <td>{{ $fakultas->id }}</td>
                                        <td>{{ $fakultas->name }}</td>
                                        <td>{{ $fakultas->jenjang->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.fakultas.edit', $fakultas->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.fakultas.destroy', $fakultas->id) }}" method="POST"
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
                                        <td colspan="4">No fakultas found.</td>
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
