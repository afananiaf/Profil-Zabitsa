@props(['figure'])

<article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-line bg-surface shadow-[0_1px_3px_rgba(11,43,38,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/25 hover:shadow-[0_16px_36px_rgba(11,43,38,0.1)]">
    <a href="{{ route('biographies.show', $figure->slug) }}" class="relative mx-auto mt-7 block h-28 w-28 overflow-hidden rounded-full border-4 border-cream" aria-label="Lihat biografi {{ $figure->name }}">
        @if ($figure->photo)
            <img src="{{ asset('storage/' . $figure->photo) }}" alt="{{ $figure->name }}" loading="lazy" class="h-full w-full object-cover">
        @else
            <span class="flex h-full w-full items-center justify-center bg-gradient-to-b from-secondary to-primary font-sans text-3xl font-bold text-white">{{ $figure->initials }}</span>
        @endif
    </a>
    <div class="flex flex-1 flex-col p-6 pt-5">
        <h3 class="font-serif text-[19px] leading-snug text-primary">
            <a href="{{ route('biographies.show', $figure->slug) }}" class="transition-colors group-hover:text-secondary">{{ $figure->name }}</a>
        </h3>
        @if ($figure->role)
            <p class="mt-1 text-[12px] font-bold uppercase tracking-[0.14em] text-muted">{{ $figure->role }}</p>
        @endif
        @if ($figure->short_bio)
            <p class="mt-3 line-clamp-3 text-[13px] leading-6 text-muted">{{ $figure->short_bio }}</p>
        @endif
        <a href="{{ route('biographies.show', $figure->slug) }}" class="mt-auto inline-flex items-center justify-center gap-1.5 pt-5 text-[13px] font-bold text-secondary transition-colors hover:text-primary">
            Lihat Biografi
            <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
        </a>
    </div>
</article>