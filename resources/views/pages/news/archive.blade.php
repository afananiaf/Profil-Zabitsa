<x-layouts.app active="news" title="Arsip Berita — Wilayah Zaid bin Tsabit" description="Arsip berita dan pengumuman Wilayah Zaid bin Tsabit berdasarkan kategori dan tahun.">

    <x-page-hero title="Arsip Berita" eyebrow="Informasi" description="Arsip lengkap berita dan pengumuman Wilayah Zaid bin Tsabit." :breadcrumb="true" parent="Berita" />

    <div class="container-app py-14">
        <form method="GET" action="{{ route('news.archive') }}" class="reveal flex flex-col gap-4 rounded-2xl border border-line bg-surface p-5 sm:flex-row">
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
            <div class="relative sm:w-52">
                <label for="year" class="sr-only">Filter tahun</label>
                <select id="year" name="year" class="field appearance-none pr-10">
                    <option value="">Semua Tahun</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" @selected((string) $selectedYear === (string) $year)>{{ $year }}</option>
                    @endforeach
                </select>
                <x-icon name="chevron-down" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" />
            </div>
            <button type="submit" class="btn-primary shrink-0 !px-6">Terapkan</button>
            @if ($selectedCategory !== 'semua' || $selectedYear)
                <a href="{{ route('news.archive') }}" class="btn-ghost shrink-0 !px-4 text-[13px]">Reset</a>
            @endif
            <a href="{{ route('news.index') }}" class="btn-ghost shrink-0 !px-4 text-[13px]">Berita Terbaru</a>
        </form>

        @if ($archives->isEmpty())
            <div class="mt-10">
                <x-empty-state icon="archive" title="Arsip kosong" description="Belum ada berita pada filter yang dipilih." action-label="Reset Filter" :action-url="route('news.archive')" />
            </div>
        @else
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($archives as $article)
                    <div class="reveal">
                        <x-news-card :article="$article" />
                    </div>
                @endforeach
            </div>
            {{ $archives->links() }}
        @endif
    </div>

</x-layouts.app>