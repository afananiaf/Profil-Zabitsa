@props([
    'items' => [],
    'class' => 'grid grid-cols-3 gap-2.5 sm:grid-cols-4',
    'borderClass' => 'border-line',
])

<div {{ $attributes->merge(['class' => $class]) }}>
    @forelse ($items as $title => $image)
        <a href="#" title="{{ $title }}" aria-label="Dokumentasi: {{ $title }}"
            class="group relative block aspect-square overflow-hidden rounded-xl border {{ $borderClass }} transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_24px_rgba(11,43,38,0.14)]">
            @if ($image)
                <img src="{{ asset('storage/' . $image) }}" alt="{{ $title }}" loading="lazy"
                    class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
            @else
                <x-placeholder-image :label="'Dokumentasi'" class="h-full w-full" />
            @endif
        </a>
    @empty
        @for ($i = 0; $i < 4; $i++)
            <div class="relative block aspect-square overflow-hidden rounded-xl border {{ $borderClass }}">
                <x-placeholder-image label="Dokumentasi Wilayah" :tone="$i % 2 ? 'primary' : 'secondary'" class="h-full w-full" />
            </div>
        @endfor
    @endforelse
</div>