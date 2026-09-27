@props([
    'tone' => 'dark',
    'id' => 'zbs-pattern',
])

@php
    $color = $tone === 'light' ? '#ffffff' : ($tone === 'ink' ? '#1a422f' : '#FFFFFF');
@endphp

<div class="pattern-shell" aria-hidden="true">
    <svg class="h-full w-full object-cover" xmlns="http://www.w3.org/2000/svg" style="opacity: 0.05">
        <defs>
            <pattern id="{{ $id }}" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
                <g stroke="{{ $color }}" stroke-opacity="0.6" fill="none" stroke-width="0.8">
                    <path d="M60 8 L74 46 L112 60 L74 74 L60 112 L46 74 L8 60 L46 46 Z" />
                    <circle cx="60" cy="60" r="10" />
                </g>
                <g stroke="{{ $color }}" stroke-opacity="0.35" fill="none" stroke-width="0.8">
                    <path d="M60 0 V26 M60 94 V120 M0 60 H26 M94 60 H120" />
                </g>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#{{ $id }})" />
    </svg>
</div>