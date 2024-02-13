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

                    <div class="table-responsive table-card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fakultasList as $fakultas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fakultas->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ route('admin.fakultas.edit', $fakultas->id) }}">Edit</a></li>
                                                    <li>
                                                        <form action="{{ route('admin.fakultas.destroy', $fakultas->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

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
