@props(['type' => 'success', 'message' => null, 'messages' => []])

@if ($message || $messages)
    <div class="alert alert-{{ $type }} alert-dismissible fade show">
        <svg class="alert-icon me-2" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
            fill="none" stroke-linecap="round" stroke-linejoin="round">
            @if ($type == 'success')
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            @elseif ($type == 'danger')
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            @endif
        </svg>
        <strong>{{ ucfirst($type) }}!</strong>

        @if ($message)
            {{ $message }}.
        @elseif ($messages)
        <ul class="ps-4">
            @foreach ($messages as $message)
                <li class="mb-1">{{ $message }}</li>
            @endforeach
        </ul>
        @endif

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif
