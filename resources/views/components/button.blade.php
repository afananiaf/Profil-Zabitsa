@props([
    'variant' => 'primary',
    'tag' => 'a',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => '!px-4 !py-2.5 text-[13px]',
        'md' => '!px-5 !py-3 text-sm',
        'lg' => '!px-7 !py-3.5 text-[15px]',
    ];
    $classes = match ($variant) {
        'primary' => 'btn-primary',
        'gold' => 'btn-gold',
        'outline' => 'btn-outline',
        'ghost' => 'btn-ghost',
        'dark' => 'btn-dark',
        default => 'btn-primary',
    };
@endphp

<{{ $tag }} @if ($tag === 'a') href="{{ $href ?? '#' }}" @endif {{ $attributes->merge(['class' => $classes . ' ' . ($sizes[$size] ?? $sizes['md'])]) }}>
    {{ $slot }}
</{{ $tag }}>