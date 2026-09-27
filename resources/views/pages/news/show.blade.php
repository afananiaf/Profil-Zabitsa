<x-layouts.app active="news" :title="$article->title . ' — Wilayah Zaid bin Tsabit'" :description="$article->excerpt ?: 'Artikel berita Wilayah Zaid bin Tsabit.'">

    <div class="border-b border-line bg-surface">
        <div class="container-app py-10">
            <x-breadcrumb :items="[
                ['label' => 'Berita', 'url' => route('news.index')],
                ['label' => $article->title],
            ]" />
            <div class="reveal max-w-3xl">
                <div class="flex flex-wrap items-center gap-3 text-xs text-muted">
                    @if ($article->category)
                        <span class="tag bg-primary/5 text-primary">{{ $article->category->name }}</span>
                    @endif
                    <span class="inline-flex items-center gap-1.5">
                        <x-icon name="calendar" class="h-3.5 w-3.5 text-secondary" />
                        <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->full_date }}</time>
                    </span>
                    @if ($article->author)
                        <span class="inline-flex items-center gap-1.5">
                            <x-icon name="user" class="h-3.5 w-3.5 text-secondary" />
                            {{ $article->author->name }}
                        </span>
                    @endif
                </div>
                <h1 class="mt-4 font-serif text-3xl leading-tight text-primary sm:text-4xl text-balance">{{ $article->title }}</h1>
            </div>
        </div>
    </div>

    <div class="container-app py-14">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <article class="reveal min-w-0 max-w-3xl">
                <div class="overflow-hidden rounded-2xl border border-line shadow-[0_8px_30px_rgba(11,43,38,0.1)]">
                    @if ($article->thumbnail)
                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}" class="aspect-[16/8] w-full object-cover">
                    @else
                        <x-placeholder-image :label="$article->category?->name ?: 'Berita'" class="aspect-[16/8] w-full" />
                    @endif
                </div>

                @if ($article->excerpt)
                    <p class="mt-8 border-l-2 border-secondary pl-5 font-serif text-lg italic leading-8 text-primary/85">{{ $article->excerpt }}</p>
                @endif

                <div class="prose-zbs mt-8">
                    {!! $article->content !!}
                </div>

                <div class="mt-10 flex flex-wrap items-center justify-between gap-4 border-t border-line pt-6">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-muted">Bagikan Artikel</p>
                        <div class="mt-2.5 flex gap-2">
                            <button type="button" data-share data-network="native" data-url="{{ url()->current() }}" data-title="{{ $article->title }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-secondary transition-colors hover:border-primary hover:bg-primary hover:text-white" aria-label="Bagikan via aplikasi berbagi">
                                <x-icon name="share-2" class="h-4 w-4" />
                            </button>
                            <button type="button" data-share data-network="whatsapp" data-url="{{ url()->current() }}" data-title="{{ $article->title }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-secondary transition-colors hover:border-primary hover:bg-primary hover:text-white" aria-label="Bagikan ke WhatsApp">
                                <x-icon name="message-circle" class="h-4 w-4" />
                            </button>
                            <button type="button" data-share data-network="facebook" data-url="{{ url()->current() }}" data-title="{{ $article->title }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-secondary transition-colors hover:border-primary hover:bg-primary hover:text-white" aria-label="Bagikan ke Facebook">
                                <x-icon name="facebook" class="h-4 w-4" />
                            </button>
                            <button type="button" data-share data-network="twitter" data-url="{{ url()->current() }}" data-title="{{ $article->title }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-secondary transition-colors hover:border-primary hover:bg-primary hover:text-white" aria-label="Bagikan ke X (Twitter)">
                                <x-icon name="twitter" class="h-4 w-4" />
                            </button>
                            <button type="button" data-copy data-copy="{{ url()->current() }}" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-secondary transition-colors hover:border-primary hover:bg-primary hover:text-white" aria-label="Salin tautan artikel">
                                <x-icon name="copy" class="h-4 w-4" />
                            </button>
                        </div>
                    </div>
                    <a href="{{ route('news.index') }}" class="btn-outline !px-4 !py-2.5 text-[13px]">
                        <x-icon name="chevron-left" class="h-4 w-4" />
                        Semua Berita
                    </a>
                </div>
            </article>

            <aside class="space-y-6">
                <div class="reveal rounded-2xl border border-line bg-surface p-6">
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">Kategori</h3>
                    <ul class="mt-4 space-y-2">
                        @foreach ($article->category ? collect([$article->category]) : collect() as $category)
                            <li>
                                <a href="{{ route('news.index', ['category' => $category->slug]) }}" class="chip !w-full justify-between !py-2 transition-colors hover:border-primary/40 hover:text-primary">
                                    {{ $category->name }}
                                    <x-icon name="chevron-right" class="h-3.5 w-3.5" />
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('news.archive') }}" class="chip !w-full justify-between !py-2 transition-colors hover:border-primary/40 hover:text-primary">
                                Arsip Berita
                                <x-icon name="chevron-right" class="h-3.5 w-3.5" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="reveal rounded-2xl border border-line bg-cream p-6 text-primary">
                    <x-icon name="send" class="h-6 w-6 text-secondary" />
                    <h3 class="mt-4 font-serif text-lg">Punya Informasi untuk Kami?</h3>
                    <p class="mt-2 text-[13px] leading-6 text-muted">Sampaikan informasi atau pertanyaan melalui laman kontak resmi.</p>
                    <a href="{{ route('contact') }}" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-primary">
                        Hubungi Kami
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </aside>
        </div>

        @if ($related->isNotEmpty())
            <section class="mt-16">
                <div class="reveal flex items-end justify-between gap-4">
                    <x-section-heading eyebrow="Baca Juga" title="Berita Terkait" />
                    <a href="{{ route('news.index') }}" class="btn-outline mb-1 !px-4 !py-2.5 text-[13px]">Semua Berita</a>
                </div>
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($related as $relatedArticle)
                        <div class="reveal">
                            <x-news-card :article="$relatedArticle" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

</x-layouts.app>