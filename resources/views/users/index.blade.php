@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                Daftar Pengguna
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <a href="{{ route('users.create') }}" class="btn btn-success">Tambah Pengguna</a>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_admin)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-icon btn-sm btn-info">
                                        <i class="bx bxs-show"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-icon btn-sm btn-primary">
                                        <i class="bx bxs-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-sm btn-danger"
                                            onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">
                                            <i class="bx bxs-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}

            </div>

        </div>
    </div>
@endsection
