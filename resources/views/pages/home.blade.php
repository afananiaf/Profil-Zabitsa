@php
    $heroSlides = [
        ['label' => 'Dokumentasi Kegiatan Pendidikan Wilayah', 'tone' => 'primary'],
        ['label' => 'Kegiatan Pembinaan & Pengajian', 'tone' => 'secondary'],
        ['label' => 'Bangunan & Lingkungan Wilayah', 'tone' => 'dark'],
    ];

    $values = [
        ['icon' => 'book-open', 'title' => 'Pendidikan', 'desc' => 'Kurikulum terstruktur pada setiap jenjang.'],
        ['icon' => 'heart', 'title' => 'Pembinaan', 'desc' => 'Pendampingan akhlak dan karakter Islami.'],
        ['icon' => 'trending-up', 'title' => 'Pengembangan', 'desc' => 'Mengasah potensi dan kompetensi santri.'],
        ['icon' => 'users', 'title' => 'Kontribusi', 'desc' => 'Berperan aktif bagi kemaslahatan umat.'],
    ];

    $steps = [
        ['title' => 'Sejarah Wilayah', 'icon' => 'landmark', 'route' => 'about.history'],
        ['title' => 'Visi & Misi', 'icon' => 'compass', 'route' => 'about.vision'],
        ['title' => 'Sistem Pendidikan', 'icon' => 'graduation-cap', 'route' => 'education.index'],
        ['title' => 'Struktur Wilayah', 'icon' => 'building-2', 'route' => 'structures.index'],
        ['title' => 'Kegiatan & Pengembangan', 'icon' => 'calendar', 'route' => 'activities.index'],
    ];

    $levels = $levels ?? collect();
@endphp

<x-layouts.app>

    <div class="bulletin-shell">

    {{-- ================= HERO ================= --}}
    <section class="relative overflow-hidden bg-cream">
        <x-pattern tone="ink" id="home-hero-pattern" />
        <div class="relative mx-auto grid w-full max-w-7xl grid-cols-1 items-center gap-8 px-4 py-12 sm:py-16 lg:grid-cols-2 lg:gap-10">

            <div class="w-full space-y-5">
                <h1 class="font-serif text-4xl leading-[1.1] tracking-tight text-primary sm:text-5xl lg:text-[56px]">
                    Terciptanya Santri yang
                    <span class="italic text-secondary">Qur'ani</span>,<br>
                    Berilmu dan<br>
                    <span class="relative inline-block">Berakhlakul Karimah
                        <span class="absolute -bottom-1 left-0 h-[3px] w-full rounded-full bg-gold" aria-hidden="true"></span>
                    </span>.
                </h1>

                <p class="max-w-xl text-[15px] leading-7 text-muted">
                    Website resmi Wilayah Zaid bin Tsabit sebagai pusat informasi, profil, pendidikan, kegiatan, dan dokumentasi wilayah.
                </p>

                <div class="flex flex-wrap items-center gap-3 pt-1">
                    <a href="{{ route('about.history') }}" class="btn-primary !px-6 !py-3 text-[14px]">
                        Lihat Profil Wilayah
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                    <a href="{{ route('activities.index') }}" class="btn-outline !px-6 !py-3 text-[14px]">
                        Jelajahi Kegiatan
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>

            <div class="w-full">
                <div data-carousel data-autoplay="6500" aria-roledescription="carousel" aria-label="Dokumentasi wilayah">
                    <div class="relative h-64 w-full overflow-hidden rounded-2xl border border-line bg-emerald-950 shadow-[0_14px_40px_rgba(2,17,12,0.18)] sm:h-80 lg:h-[400px]">
                        @foreach ($heroSlides as $index => $slide)
                            <div data-slide class="cp-slide absolute inset-0 {{ $index === 0 ? 'is-active' : '' }}" aria-hidden="{{ $index === 0 ? 'false' : 'true' }}" data-caption="{{ $slide['label'] }}">
                                <x-placeholder-image :label="$slide['label']" :tone="$slide['tone']" class="cp-zoom h-full w-full object-cover" />
                            </div>
                        @endforeach

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5">
                            <p class="font-serif text-lg leading-snug text-white sm:text-xl">
                                <span data-hero-caption>Bangunan &amp; Lingkungan Wilayah</span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2.5" role="group" aria-label="Navigasi foto utama">
                            @foreach ($heroSlides as $index => $slide)
                                <button type="button" data-carousel-dot class="cp-dot {{ $index === 0 ? 'is-active' : '' }}" aria-label="Tampilkan foto {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <p class="text-[12px] font-medium text-muted">{{ count($heroSlides) }} Foto ›</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= STATISTIK ================= --}}
    <section class="border-y border-line bg-surface py-10 sm:py-12">
        <div class="container-app">
            <div class="grid grid-cols-2 gap-x-8 gap-y-10 lg:grid-cols-4">
                @foreach ($stats as $stat)
                    <x-stat-item
                        :value="$stat['value']"
                        :label="$stat['label']"
                        :note="$stat['note']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= MENGENAL WILAYAH ================= --}}
    <section class="bg-cream py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Mengenal Wilayah Zaid bin Tsabit</h2>
                <a href="{{ route('about.history') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Baca Sejarah
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            <p class="max-w-2xl text-[14.5px] leading-7 text-muted">
                Wilayah Zaid bin Tsabit adalah wilayah satelit di bawah naungan Pondok Pesantren Nurul Jadid — berkomitmen membina santri yang Qur'ani, berilmu, dan berakhlakul karimah.
            </p>

            <div class="mt-7 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($values as $index => $item)
                    <article class="reveal rounded-2xl border border-line bg-surface p-5 transition-colors duration-300 hover:border-gold/40" style="transition-delay: {{ $index * 60 }}ms">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary text-goldlight">
                            <x-icon :name="$item['icon']" class="h-5 w-5" />
                        </span>
                        <h3 class="mt-4 font-serif text-[17px] leading-snug text-primary">{{ $item['title'] }}</h3>
                        <p class="mt-1.5 text-[13px] leading-6 text-muted">{{ $item['desc'] }}</p>
                        <a href="{{ route('about.history') }}" class="mt-4 inline-flex items-center gap-1.5 text-[12.5px] font-bold text-primary transition-colors hover:text-gold">
                            Selengkapnya
                            <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= PERJALANAN & SEJARAH ================= --}}
    <section class="bg-surface py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Perjalanan &amp; Sejarah Wilayah</h2>
                <a href="{{ route('about.history') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Eksplorasi
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach ($steps as $step)
                    <a href="{{ route($step['route']) }}" class="group rounded-2xl border border-line bg-cream p-5 text-center transition-colors duration-300 hover:border-gold/40">
                        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-primary text-goldlight transition-colors duration-300 group-hover:bg-primary-solid">
                            <x-icon :name="$step['icon']" class="h-6 w-6" />
                        </span>
                        <h3 class="mt-3 text-[13.5px] font-bold leading-snug text-primary transition-colors duration-300 group-hover:text-secondary">{{ $step['title'] }}</h3>
                        <span class="mt-1.5 inline-flex items-center gap-1 text-[11px] font-semibold uppercase tracking-wide text-muted transition-colors duration-300 group-hover:text-gold">
                            Jelajahi
                            <x-icon name="arrow-right" class="h-3 w-3" />
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= JENJANG PENDIDIKAN ================= --}}
    <section class="bg-cream py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Jenjang Pendidikan</h2>
                <a href="{{ route('education.index') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Semua Jenjang
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            @if ($levels->isNotEmpty())
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($levels as $index => $level)
                        <a href="{{ route('education.show', $level->slug) }}"
                            class="reveal group flex flex-col justify-between rounded-2xl border border-line bg-surface p-6 transition-colors duration-300 hover:border-gold/40" style="transition-delay: {{ $index * 60 }}ms">
                            <div>
                                <div class="flex items-center justify-between">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-primary font-serif text-[15px] font-semibold text-goldlight">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <x-icon name="arrow-up-right" class="h-4 w-4 text-muted/60 transition-colors duration-300 group-hover:text-gold" />
                                </div>
                                <h3 class="mt-5 font-serif text-[22px] leading-snug text-primary">{{ $level->name }}</h3>
                                @if ($level->short_name)
                                    <p class="mt-1 text-[10.5px] font-bold uppercase tracking-[0.2em] text-gold">{{ $level->short_name }}</p>
                                @endif
                                @if ($level->description)
                                    <p class="mt-2 line-clamp-2 text-[13.5px] leading-6 text-muted">{{ $level->description }}</p>
                                @endif
                            </div>
                            <span class="mt-6 inline-flex items-center gap-1.5 text-[13px] font-bold text-primary transition-colors duration-300 group-hover:text-gold">
                                Lihat Jenjang
                                <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                            </span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ================= BERITA & INFORMASI ================= --}}
    <section class="bg-surface py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Berita &amp; Informasi</h2>
                <a href="{{ route('news.index') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Semua Berita
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            @if ($featuredNews->isNotEmpty())
                @php $featured = $featuredNews->first(); @endphp
                <a href="{{ route('news.show', $featured->slug) }}" class="reveal group grid overflow-hidden rounded-2xl border border-line bg-cream lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="relative min-h-[240px] overflow-hidden sm:min-h-[300px]">
                        @if ($featured->thumbnail)
                            <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <x-placeholder-image label="Berita Utama" class="absolute inset-0 h-full w-full transition-transform duration-700 group-hover:scale-105" />
                        @endif
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-dark/50 to-transparent" aria-hidden="true"></div>
                        <span class="tag absolute left-4 top-4 bg-primary text-goldlight shadow-sm">Berita Unggulan</span>
                    </div>
                    <div class="flex flex-col justify-center p-6 sm:p-8">
                        <div class="flex flex-wrap items-center gap-3 text-xs text-muted">
                            @if ($featured->category)
                                <span class="tag bg-primary/8 text-primary">{{ $featured->category->name }}</span>
                            @endif
                            <span class="inline-flex items-center gap-1.5">
                                <x-icon name="calendar" class="h-3.5 w-3.5 text-gold" />
                                <time datetime="{{ optional($featured->published_at)->toDateString() }}">{{ $featured->formatted_date }}</time>
                            </span>
                        </div>
                        <h3 class="mt-4 font-serif text-[22px] leading-snug text-primary sm:text-3xl text-balance">{{ $featured->title }}</h3>
                        <p class="mt-3 line-clamp-3 text-[14px] leading-7 text-muted">{{ $featured->excerpt }}</p>
                        <span class="mt-5 inline-flex items-center gap-1.5 text-[13px] font-bold text-primary transition-colors group-hover:text-gold">
                            Baca Selengkapnya
                            <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </span>
                    </div>
                </a>
            @endif

            @if ($latestNews->isNotEmpty())
                <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($latestNews->take(3) as $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="reveal group flex flex-col overflow-hidden rounded-2xl border border-line bg-cream transition-colors duration-300 hover:border-gold/40">
                            <div class="relative aspect-video overflow-hidden">
                                @if ($item->thumbnail)
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <x-placeholder-image :label="$item->title" class="absolute inset-0 h-full w-full transition-transform duration-700 group-hover:scale-105" />
                                @endif
                                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-dark/30 to-transparent" aria-hidden="true"></div>
                                <span class="tag absolute left-3 top-3 bg-primary text-goldlight shadow-sm">{{ $item->category?->name ?? 'Berita' }}</span>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-[0.14em] text-muted">
                                    <x-icon name="calendar" class="h-3.5 w-3.5 text-gold" />
                                    {{ $item->formatted_date }}
                                </span>
                                <h3 class="mt-2.5 line-clamp-2 font-serif text-[17px] leading-snug text-primary transition-colors duration-300 group-hover:text-secondary">{{ $item->title }}</h3>
                                @if ($item->excerpt)
                                    <p class="mt-2 line-clamp-2 text-[13px] leading-6 text-muted">{{ $item->excerpt }}</p>
                                @endif
                                <span class="mt-auto inline-flex items-center gap-1.5 pt-4 text-[12.5px] font-bold text-primary transition-colors duration-300 group-hover:text-gold">
                                    Baca
                                    <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ================= KEGIATAN & DOKUMENTASI ================= --}}
    <section class="bg-cream py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Kegiatan &amp; Dokumentasi</h2>
                <a href="{{ route('activities.index') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Lihat Semua
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            @if ($latestActivities->isNotEmpty())
                <div class="reveal grid gap-4 lg:grid-cols-[1.2fr_1fr]">
                    @php $featuredActivity = $latestActivities->get(0); @endphp
                    @if ($featuredActivity)
                        <a href="{{ route('activities.show', $featuredActivity->slug) }}" class="group relative overflow-hidden rounded-2xl">
                            <div class="relative min-h-[340px] sm:min-h-[380px] lg:h-full">
                                @if ($featuredActivity->image)
                                    <img src="{{ asset('storage/' . $featuredActivity->image) }}" alt="{{ $featuredActivity->title }}" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]">
                                @else
                                    <x-placeholder-image :label="$featuredActivity->title" class="absolute inset-0 h-full w-full transition-transform duration-700 group-hover:scale-[1.03]" />
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-dark/15 to-transparent"></div>
                                <div class="absolute inset-x-0 bottom-0 p-6">
                                    <span class="tag bg-goldlight text-primary shadow-sm">{{ $featuredActivity->date_range }}</span>
                                    <h3 class="mt-3 font-serif text-[24px] leading-snug text-white sm:text-[28px]">{{ $featuredActivity->title }}</h3>
                                    <span class="mt-3 inline-flex items-center gap-2 text-[12.5px] font-bold text-goldlight transition-all duration-300 group-hover:translate-x-1">
                                        Lihat Kegiatan
                                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endif

                    <div class="grid gap-4">
                        @foreach ($latestActivities->slice(1, 2) as $index => $activity)
                            <a href="{{ route('activities.show', $activity->slug) }}"
                                class="reveal group relative overflow-hidden rounded-2xl border border-line bg-surface transition-colors duration-300 hover:border-gold/50" style="transition-delay: {{ ($index + 1) * 80 }}ms">
                                <div class="relative min-h-[180px] sm:min-h-[200px]">
                                    @if ($activity->image)
                                        <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" loading="lazy" class="absolute inset-0 h-full min-h-[180px] w-full object-cover transition-transform duration-700 group-hover:scale-105">
                                    @else
                                        <x-placeholder-image :label="$activity->title" class="absolute inset-0 h-full min-h-[180px] w-full transition-transform duration-700 group-hover:scale-105" />
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-dark/75 via-dark/10 to-transparent"></div>
                                    <div class="absolute inset-x-0 bottom-0 p-5">
                                        <span class="tag bg-goldlight text-primary shadow-sm">{{ $activity->date_range }}</span>
                                        <h3 class="mt-2.5 line-clamp-2 font-serif text-[18px] leading-snug text-white">{{ $activity->title }}</h3>
                                        <span class="mt-2 inline-flex items-center gap-2 text-[12px] font-bold text-goldlight opacity-90 transition-all duration-300 group-hover:translate-x-1">
                                            Selengkapnya
                                            <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- ================= DOKUMEN & DOWNLOAD ================= --}}
    <section class="bg-surface py-12 sm:py-16">
        <div class="container-app">
            <div class="mb-7 flex items-end justify-between gap-4">
                <h2 class="section-title">Dokumen &amp; Informasi</h2>
                <a href="{{ route('documents.index') }}" class="hidden shrink-0 items-center gap-1.5 text-[13.5px] font-bold text-primary transition-colors hover:text-gold sm:inline-flex">
                    Halaman Download
                    <x-icon name="download" class="h-4 w-4" />
                </a>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                @forelse ($documents as $document)
                    <div class="reveal flex items-center gap-4 rounded-2xl border border-line bg-cream p-5 transition-colors duration-300 hover:border-gold/40">
                        <span class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-xl bg-primary text-goldlight" aria-hidden="true">
                            <x-icon :name="in_array(strtolower($document->extension), ['doc', 'docx']) ? 'file' : 'file-text'" class="h-5 w-5" />
                            <span class="mt-0.5 text-[8px] font-extrabold leading-none tracking-wide text-goldlight/80">{{ $document->extension ? strtoupper($document->extension) : 'FILE' }}</span>
                        </span>
                        <div class="min-w-0 flex-1">
                            <h3 class="line-clamp-2 font-serif text-[15.5px] leading-snug text-primary">{{ $document->title }}</h3>
                            <p class="mt-1 text-[11.5px] text-muted">
                                {{ $document->category }} · {{ $document->size_label }}
                                @if ($document->uploaded_at)
                                    · {{ $document->uploaded_at->translatedFormat('d M Y') }}
                                @endif
                            </p>
                        </div>
                        @if ($document->file_path)
                            <a href="{{ route('documents.download', $document->slug) }}" aria-label="Unduh {{ $document->title }}"
                                class="inline-flex shrink-0 items-center gap-2 rounded-full bg-primary px-4 py-2.5 text-[12.5px] font-bold text-goldlight transition-colors duration-300 hover:bg-primary-solid">
                                Unduh
                                <x-icon name="download" class="h-4 w-4" />
                            </a>
                        @else
                            <span class="shrink-0 rounded-full border border-line px-3.5 py-2 text-[11.5px] font-semibold text-muted">Segera</span>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full flex items-center gap-4 rounded-2xl border border-line bg-cream p-6 text-muted">
                        <x-icon name="file-text" class="h-5 w-5 shrink-0 text-gold" />
                        <p class="text-sm">Dokumen sedang disiapkan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-4 flex items-center gap-3 rounded-2xl border border-line bg-cream p-4">
                <x-icon name="info" class="h-4.5 w-4.5 shrink-0 text-gold" />
                <p class="text-[12.5px] leading-6 text-muted">
                    Dokumen yang tersedia saat ini merupakan <strong class="font-semibold text-primary">berkas contoh (placeholder)</strong> yang akan digantikan dengan dokumen resmi wilayah.
                </p>
            </div>

            {{-- ================= CTA / NEWSLETTER ================= --}}
            <div class="reveal relative mt-10 overflow-hidden rounded-3xl bg-dark px-6 py-12 sm:px-12 sm:py-14" style="transition-delay: 100ms">
                <x-pattern tone="light" id="home-newsletter" />
                <div class="relative mx-auto max-w-2xl text-center">
                    <h2 class="font-serif text-3xl leading-[1.12] text-white sm:text-4xl text-balance">
                        Mari Mengenal Lebih Dekat<br>Wilayah Zaid bin Tsabit
                    </h2>
                    <p class="mx-auto mt-4 max-w-xl text-[14.5px] leading-7 text-white/65">
                        Temukan informasi lengkap tentang profil, pendidikan, kegiatan, dan program unggulan kami.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center justify-center gap-2 rounded-full bg-goldlight px-8 py-3.5 text-[14px] font-semibold text-dark transition-all duration-300 hover:-translate-y-0.5 hover:bg-cream">
                        Hubungi Kami
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    </div>
</x-layouts.app>