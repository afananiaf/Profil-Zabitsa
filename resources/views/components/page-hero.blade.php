@props([
    'title' => '',
    'description' => '',
])

<section class="relative overflow-hidden bg-cream">
    <x-pattern tone="ink" id="pagehero-pattern" />
    <div class="container-app relative py-16 sm:py-24">
        @if ($breadcrumb ?? false)
            <nav aria-label="Breadcrumb" class="mb-8">
                <ol class="flex flex-wrap items-center gap-2 text-[13px] text-muted">
                    <li>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 transition-colors hover:text-primary">
                            <x-icon name="home" class="h-3.5 w-3.5" />
                            Beranda
                        </a>
                    </li>
                    @if ($parent ?? null)
                        <li class="flex items-center gap-2">
                            <span class="text-gold">/</span>
                            <span>{{ $parent }}</span>
                        </li>
                    @endif
                    @if ($title)
                        <li class="flex items-center gap-2">
                            <span class="text-gold">/</span>
                            <span class="font-semibold text-primary" aria-current="page">{{ $title }}</span>
                        </li>
                    @endif
                </ol>
            </nav>
        @endif
        <div class="reveal max-w-3xl">
            <h1 class="text-4xl leading-[1.1] text-primary sm:text-5xl md:text-[56px] text-balance">{{ $title }}</h1>
            @if ($description ?? '')
                <p class="mt-6 max-w-2xl text-[15.5px] leading-8 text-muted">{{ $description }}</p>
            @endif
        </div>
    </div>
    <div class="absolute inset-x-0 bottom-0 h-px bg-line" aria-hidden="true"></div>
</section>