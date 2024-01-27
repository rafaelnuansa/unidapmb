@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">View Alternative</h4>
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $alternative->name }}</h3>

            <div class="mb-4">
                <h4 class="card-subtitle mb-2">Criteria:</h4>
                <ul class="list-group">
                    @foreach ($alternative->criteria as $criterion)
                        <li class="list-group-item">{{ $criterion->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-4">
                <h4 class="card-subtitle mb-2">Subcriteria:</h4>
                <ul class="list-group">
                    @foreach ($alternative->subcriteria as $subcriterion)
                        <li class="list-group-item">{{ $subcriterion->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
