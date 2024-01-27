@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Data Alternatif</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Alternatif</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Alternatif</h4>
            </div>
            <div class="card-body">
                    <div class="mb-4">
                        <a href="{{ route('alternatives.create') }}" class="btn btn-primary">Create Alternative</a>
                    </div>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Alternatif</th>
                                @foreach ($criteria as $criterion)
                                    <th>{{ $criterion->name }}</th>
                                @endforeach
                                <th>User</th>
                              
                                    <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alternatives as $alternative)
                                <tr>
                                    <td>{{ $alternative->id }}</td>
                                    <td>{{ $alternative->name }}</td>
                                    @foreach ($criteria as $criterion)
                                        <td>
                                            @foreach ($alternative->subcriteria->where('criteria_id', $criterion->id) as $subcriterion)
                                                {{ $subcriterion->name }}
                                                <br>
                                            @endforeach
                                        </td>
                                    @endforeach
                                    <td>{{ $alternative->user->name }}</td>
                                    <td>
                                        @if (auth()->check() && (auth()->user()->is_admin || auth()->user()->id == $alternative->user_id))
                                            <a href="{{ route('alternatives.show', $alternative->id) }}"
                                                class="btn btn-primary btn-sm btn-icon">
                                                <i class="ri-eye-2-line"></i>
                                            </a>
                                            <a href="{{ route('alternatives.edit', $alternative->id) }}"
                                                class="btn btn-success btn-icon btn-sm">
                                                <i class="ri-quill-pen-fill"></i>
                                            </a>
                                            <form action="{{ route('alternatives.destroy', $alternative->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-icon"
                                                    onclick="return confirm('Anda yakin ingin menghapus alternative ini?')">
                                                    <i class="ri-delete-bin-2-line"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
