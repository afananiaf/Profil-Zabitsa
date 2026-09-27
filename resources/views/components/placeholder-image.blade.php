@props([
    'label' => 'Dokumentasi Wilayah',
    'tone' => 'primary',
    'class' => '',
])

@php
    $tones = [
        'primary' => ['bg1' => '#1a422f', 'bg2' => '#02110c'],
        'secondary' => ['bg1' => '#122e21', 'bg2' => '#02110c'],
        'dark' => ['bg1' => '#02110c', 'bg2' => '#000000'],
        'gold' => ['bg1' => '#ffffff', 'bg2' => '#1a422f'],
    ];
    $t = $tones[$tone] ?? $tones['primary'];
    $id = 'ph-' . md5($label . $tone);
@endphp

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600" preserveAspectRatio="xMidYMid slice" role="img" aria-label="{{ $label }}" class="{{ $class }}">
    <defs>
        <linearGradient id="{{ $id }}-bg" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0" stop-color="{{ $t['bg1'] }}"/>
            <stop offset="1" stop-color="{{ $t['bg2'] }}"/>
        </linearGradient>
        <pattern id="{{ $id }}-pattern" x="0" y="0" width="120" height="120" patternUnits="userSpaceOnUse">
            <g stroke="#ffffff" stroke-opacity="0.12" fill="none" stroke-width="0.8">
                <path d="M60 8 L74 46 L112 60 L74 74 L60 112 L46 74 L8 60 L46 46 Z" />
                <circle cx="60" cy="60" r="10" />
            </g>
        </pattern>
    </defs>
    <rect width="800" height="600" fill="url(#{{ $id }}-bg)"/>
    <rect width="800" height="600" fill="url(#{{ $id }}-pattern)"/>
    <text x="400" y="305" text-anchor="middle" font-family="'Plus Jakarta Sans', 'Arial', sans-serif" font-size="30" letter-spacing="2" fill="#ffffff" fill-opacity="0.9">{{ $label }}</text>
</svg>