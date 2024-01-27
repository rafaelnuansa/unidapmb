@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Pengguna Baru
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Nama:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation">Konfirmasi Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="is_admin">Role:</label>
                        <select name="is_admin" id="is_admin" class="form-control" required>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
