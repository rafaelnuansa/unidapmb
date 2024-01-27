@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="col-12">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Registrasi</th>
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
                                    <td>{{ $registration->status }}</td>
                                    <td>{{ $registration->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <!-- Add action buttons (e.g., view, edit, delete) based on your requirements -->
                                        <!-- For example: -->
                                        <a href="{{ route('admin.daftar.show', $registration->id) }}"
                                            class="btn btn-primary">View</a>
                                        {{-- <a href="{{ route('admin.daftar.edit', $registration->id) }}"
                                            class="btn btn-warning">Edit</a> --}}
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#verificationModal{{ $registration->id }}">Verify</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#rejectionModal{{ $registration->id }}">Reject</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#cancellationModal{{ $registration->id }}">Cancel</button>
                                        <!-- You can add more actions based on your needs -->
                                    </td>
                                </tr>

                                <!-- Verification Modal -->
                                <div class="modal fade" id="verificationModal{{ $registration->id }}" tabindex="-1"
                                    aria-labelledby="verificationModalLabel{{ $registration->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="verificationModalLabel{{ $registration->id }}">
                                                    Verification Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to verify this registration?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                {{-- <a href="{{ route('admin.daftar.verify', $registration->id) }}"
                                            class="btn btn-success">Verify</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Rejection Modal -->

                                <div class="modal fade" id="rejectionModal{{ $registration->id }}" tabindex="-1"
                                    aria-labelledby="rejectionModalLabel{{ $registration->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rejectionModalLabel{{ $registration->id }}">
                                                    Rejection
                                                    Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to reject this registration?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                {{-- <a href="{{ route('admin.daftar.reject', $registration->id) }}" class="btn btn-danger">Reject</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cancellation Modal -->
                                <div class="modal fade" id="cancellationModal{{ $registration->id }}" tabindex="-1"
                                    aria-labelledby="cancellationModalLabel{{ $registration->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rejectionModalLabel{{ $registration->id }}">
                                                    Rejection
                                                    Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to reject this registration?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                {{-- <a href="{{ route('admin.daftar.reject', $registration->id) }}" class="btn btn-danger">Reject</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5">No registrations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
