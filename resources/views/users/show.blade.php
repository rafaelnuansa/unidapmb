@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detail Pengguna
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                    </tbody>
                </table>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
