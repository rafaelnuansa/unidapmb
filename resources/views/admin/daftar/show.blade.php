<!-- resources/views/admin/daftar/show.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registration Information</h5>

                    <p><strong>Nomor Registrasi:</strong> {{ $registration->nomor_registrasi }}</p>

                    <div class="mb-3">
                        <a href="{{ route('admin.daftar.index') }}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
