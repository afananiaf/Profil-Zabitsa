<x-layouts.app active="news" title="Berita — Wilayah Zaid bin Tsabit" description="Berita dan pengumuman resmi Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Berita" eyebrow="Informasi" description="Berita, pengumuman, dan informasi terbaru dari Wilayah Zaid bin Tsabit." :breadcrumb="true" />

    <div class="container-app py-14">

        <form method="GET" action="{{ route('news.index') }}" class="reveal flex flex-col gap-4 rounded-2xl border border-line bg-surface p-5 sm:flex-row">
            <div class="relative flex-1">
                <label for="q" class="sr-only">Cari berita</label>
                <x-icon name="search" class="pointer-events-none absolute left-4 top-1/2 h-4.5 w-4.5 -translate-y-1/2 text-muted" />
                <input id="q" type="search" name="q" value="{{ $keyword }}" placeholder="Cari judul berita..."
                    class="field !pl-11">
            </div>
            <div class="relative sm:w-64">
                <label for="category" class="sr-only">Filter kategori</label>
                <select id="category" name="category" class="field appearance-none pr-10">
                    <option value="semua" @selected($selectedCategory === 'semua')>Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-icon name="chevron-down" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" />
            </div>
            <button type="submit" class="btn-primary shrink-0 !px-6">Cari</button>
            @if ($keyword || $selectedCategory !== 'semua')
                <a href="{{ route('news.index') }}" class="btn-ghost shrink-0 !px-4 text-[13px]">Reset</a>
            @endif
        </form>

        @if ($featured && $articles->isNotEmpty())
            <div class="reveal mt-10">
                <article class="group grid overflow-hidden rounded-2xl border border-line bg-surface lg:grid-cols-2">
                    <a href="{{ route('news.show', $featured->slug) }}" class="relative block overflow-hidden" aria-label="Baca berita unggulan: {{ $featured->title }}">
                        @if ($featured->thumbnail)
                            <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" class="h-full min-h-[260px] w-full object-cover">
                        @else
                            <x-placeholder-image label="Berita Utama" class="h-full min-h-[260px] w-full" />
                        @endif
                        <span class="tag absolute left-4 top-4 bg-primary text-white">Berita Unggulan</span>
                    </a>
                    <div class="flex flex-col justify-center p-7 sm:p-10">
                        <div class="flex flex-wrap items-center gap-3 text-xs text-muted">
                            @if ($featured->category)
                                <span class="tag bg-primary/5 text-primary">{{ $featured->category->name }}</span>
                            @endif
                            <span class="inline-flex items-center gap-1.5">
                                <x-icon name="calendar" class="h-3.5 w-3.5 text-secondary" />
                                <time datetime="{{ $featured->published_at->toDateString() }}">{{ $featured->formatted_date }}</time>
                            </span>
                        </div>
                        <h2 class="mt-4 font-serif text-2xl leading-snug text-primary sm:text-3xl text-balance">
                            <a href="{{ route('news.show', $featured->slug) }}" class="transition-colors group-hover:text-secondary">{{ $featured->title }}</a>
                        </h2>
                        <p class="mt-4 line-clamp-3 text-[14.5px] leading-7 text-muted">{{ $featured->excerpt }}</p>
                        <a href="{{ route('news.show', $featured->slug) }}" class="mt-6 inline-flex items-center gap-1.5 text-[13.5px] font-bold text-secondary transition-colors hover:text-primary">
                            Baca Selengkapnya
                            <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </a>
                    </div>
                </article>
            </div>
        @endif

        @if ($articles->isEmpty())
            <div class="mt-10">
                <x-empty-state icon="newspaper" title="Berita tidak ditemukan" description="Tidak ada berita yang cocok dengan pencarian Anda. Coba kata kunci lain atau reset filter." action-label="Reset Pencarian" :action-url="route('news.index')" />
            </div>
        @else
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($articles as $article)
                    <div class="reveal">
                        <x-news-card :article="$article" />
                    </div>
                @endforeach
            </div>
            {{ $articles->links() }}
        @endif
    </div>

</x-layouts.app>