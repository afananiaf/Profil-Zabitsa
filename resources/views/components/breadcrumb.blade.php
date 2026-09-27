@props(['items' => []])

<nav aria-label="Breadcrumb" class="mb-8">
    <ol class="flex flex-wrap items-center gap-1.5 text-[13px] text-muted">
        <li>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 transition-colors hover:text-primary">
                <x-icon name="home" class="h-3.5 w-3.5" />
                Beranda
            </a>
        </li>
        @foreach ($items as $item)
            <li class="flex items-center gap-1.5">
                <x-icon name="chevron-right" class="h-3 w-3 opacity-50" />
                @if (isset($item['url']))
                    <a href="{{ $item['url'] }}" class="transition-colors hover:text-primary">{{ $item['label'] }}</a>
                @else
                    <span class="font-medium text-primary" aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>