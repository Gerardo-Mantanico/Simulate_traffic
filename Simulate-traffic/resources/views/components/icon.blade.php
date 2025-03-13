{{-- Reutilizable para múltiples íconos --}}
@props([
    'name', // Nombre del icono
    'variant' => 'outline',
])

@php
    if ($variant === 'solid') {
        throw new \Exception('The "solid" variant is not supported in Lucide.');
    }

    $classes = Flux::classes('shrink-0')->add(
        match ($variant) {
            'outline' => '[:where(&)]:size-6',
            'mini' => '[:where(&)]:size-5',
            'micro' => '[:where(&)]:size-4',
        },
    );

    $strokeWidth = match ($variant) {
        'outline' => 2,
        'mini' => 2.25,
        'micro' => 2.5,
    };

    // Lista de iconos soportados
    $icons = [
        'folder-git-2' => '<path d="M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v5" />
                          <circle cx="13" cy="12" r="2" />
                          <path d="M18 19c-2.8 0-5-2.2-5-5v8" />
                          <circle cx="20" cy="19" r="2" />',
        'home' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                   <polyline points="9 22 9 12 15 12 15 22" />',
        'settings' => '<circle cx="12" cy="12" r="3" />
                       <path d="M19.4 15a2 2 0 0 0 .4-1 2 2 0 0 0-.4-1l2-3a2 2 0 0 0-1.7-3h-4a8 8 0 0 0-2-1l-1-4a2 2 0 0 0-3.6 0l-1 4a8 8 0 0 0-2 1h-4a2 2 0 0 0-1.7 3l2 3a2 2 0 0 0-.4 1 2 2 0 0 0 .4 1l-2 3a2 2 0 0 0 1.7 3h4a8 8 0 0 0 2 1l1 4a2 2 0 0 0 3.6 0l1-4a8 8 0 0 0 2-1h4a2 2 0 0 0 1.7-3z" />',
               ];
@endphp

<svg
    {{ $attributes->class($classes) }}
    data-flux-icon
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="{{ $strokeWidth }}"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
    data-slot="icon"
>
    {!! $icons[$name] ?? '' !!}
</svg>
