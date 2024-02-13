@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="col-12">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card card-animate">
            <div class="card-header">Data Pendaftar</div>
            <div class="card-body">

                <div class="table-responsive table-card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Registrasi</th>
                                <th>Pendaftar</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registrations as $registration)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $registration->nomor_registrasi }}</td>
                                    <td class="fw-bold">{{ $registration->user->name }}</td>
                                    <td>{{ $registration->status }}</td>
                                    <td>{{ $registration->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{ route('admin.daftar.show', $registration->id) }}">View</a></li>
                                                <!-- Uncomment below lines to include Edit action -->
                                                <!-- <li><a class="dropdown-item" href="{{ route('admin.daftar.edit', $registration->id) }}">Edit</a></li> -->
                                                <li><button class="dropdown-item btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#verificationModal{{ $registration->id }}">Verify</button></li>
                                                <li><button class="dropdown-item btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#rejectionModal{{ $registration->id }}">Reject</button></li>
                                                <li><button class="dropdown-item btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#cancellationModal{{ $registration->id }}">Cancel</button></li>
                                                <!-- You can add more actions based on your needs -->
                                            </ul>
                                        </div>

                                    </td>
                                </tr>


                            @empty
                                <tr>
                                    <td colspan="5">No registrations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
@endsection
