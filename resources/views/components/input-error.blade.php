@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'list-unstyled text-danger small mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li><i class="bi bi-exclamation-circle"></i> {{ $message }}</li>
        @endforeach
    </ul>
@endif
