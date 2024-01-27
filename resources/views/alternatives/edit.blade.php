@extends('layouts.app')

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Alternatif</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('alternatives.update', $alternative->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Alternative Name:</label>
                    <input type="text" name="name" value="{{ $alternative->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Criteria and Subcriteria:</label>
                    @foreach ($criteria as $criterion)
                        <div class="mb-2">
                            <label for="criteria[{{ $criterion->id }}]" class="form-label">{{ $criterion->name }}</label>
                            <select name="criteria[{{ $criterion->id }}]" class="form-select" required>
                                @foreach ($subcriteria->where('criteria_id', $criterion->id) as $subcriterion)
                                    <option value="{{ $criterion->id }}_{{ $subcriterion->id }}" {{ in_array($subcriterion->id, $selectedSubcriteria) ? 'selected' : '' }}>{{ $subcriterion->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Update Alternative</button>
            </form>
        </div>
    </div>
</div>
@endsection
