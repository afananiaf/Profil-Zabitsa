@props(['article'])

<article class="group flex h-full flex-col overflow-hidden rounded-3xl border border-line bg-surface transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_28px_60px_rgba(11,43,38,0.12)]">
    <a href="{{ route('news.show', $article->slug) }}" class="relative block aspect-[16/10] overflow-hidden" aria-label="Baca: {{ $article->title }}">
        @if ($article->thumbnail)
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" loading="lazy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
        @else
            <x-placeholder-image :label="'Berita'" class="h-full w-full transition-transform duration-700 group-hover:scale-105" />
        @endif
        @if ($article->category)
            <span class="tag absolute left-4 top-4 bg-white/90 text-primary shadow-sm backdrop-blur">{{ $article->category->name }}</span>
        @endif
    </a>
    <div class="flex flex-1 flex-col p-7">
        <div class="flex items-center gap-2 text-xs text-muted">
            <x-icon name="calendar" class="h-3.5 w-3.5 text-gold" />
            <time datetime="{{ optional($article->published_at)->toDateString() }}">{{ $article->formatted_date }}</time>
        </div>
        <h3 class="mt-3 font-serif text-[21px] leading-snug text-primary transition-colors group-hover:text-secondary">
            <a href="{{ route('news.show', $article->slug) }}">{{ $article->title }}</a>
        </h3>
        <p class="mt-3 line-clamp-2 text-[13.5px] leading-6 text-muted">{{ $article->excerpt }}</p>
        <a href="{{ route('news.show', $article->slug) }}" class="mt-auto inline-flex items-center gap-2 pt-6 text-[13px] font-bold text-primary transition-colors group-hover:text-gold">
            Baca Selengkapnya
            <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
        </a>
    </div>
</article>