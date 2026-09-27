<x-layouts.app active="documents" title="Download Dokumen — Wilayah Zaid bin Tsabit" description="Pusat unduhan dokumen resmi Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Download Dokumen" eyebrow="Pusat Unduhan" description="Dokumen resmi dan formulir Wilayah Zaid bin Tsabit untuk diunduh." :breadcrumb="true" />

    <div class="container-app py-14">
        <form method="GET" action="{{ route('documents.index') }}" class="reveal flex flex-col gap-4 rounded-xl border border-line bg-surface p-5 shadow-[0_1px_3px_rgba(11,43,38,0.05)] sm:flex-row">
            <div class="relative flex-1">
                <label for="q" class="sr-only">Cari dokumen</label>
                <x-icon name="search" class="pointer-events-none absolute left-4 top-1/2 h-4.5 w-4.5 -translate-y-1/2 text-muted" />
                <input id="q" type="search" name="q" value="{{ $keyword }}" placeholder="Cari nama dokumen..."
                    class="field !pl-11">
            </div>
            <div class="relative sm:w-64">
                <label for="category" class="sr-only">Filter kategori</label>
                <select id="category" name="category" class="field appearance-none pr-10">
                    <option value="semua" @selected($selectedCategory === 'semua')>Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" @selected($selectedCategory === $category)>{{ ucfirst($category) }}</option>
                    @endforeach
                </select>
                <x-icon name="chevron-down" class="pointer-events-none absolute right-4 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" />
            </div>
            <button type="submit" class="btn-primary shrink-0 !px-6">Cari</button>
            @if ($keyword || $selectedCategory !== 'semua')
                <a href="{{ route('documents.index') }}" class="btn-ghost shrink-0 !px-4 text-[13px]">Reset</a>
            @endif
        </form>

        <div class="mt-6 flex items-start gap-3 rounded-2xl border border-line bg-cream p-4">
            <x-icon name="info" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-secondary" />
            <p class="text-[13px] leading-6 text-muted">
                Dokumen yang tersedia saat ini merupakan <strong class="font-semibold text-primary">berkas contoh (placeholder)</strong> yang akan digantikan dengan dokumen resmi wilayah.
            </p>
        </div>

        @if ($documents->isEmpty())
            <div class="mt-10">
                <x-empty-state icon="file-text" title="Dokumen tidak ditemukan" description="Tidak ada dokumen yang cocok dengan pencarian Anda." action-label="Reset Pencarian" :action-url="route('documents.index')" />
            </div>
        @else
            <div class="mt-8 rounded-xl border border-line bg-surface p-6 shadow-[0_10px_36px_rgba(11,43,38,0.06)] sm:p-8">
                <ul class="divide-y divide-line/80">
                    @foreach ($documents as $document)
                        <li class="py-4.5 first:pt-0 last:pb-0">
                            <x-document-item :document="$document" />
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-2">
                {{ $documents->links() }}
            </div>
        @endif
    </div>

</x-layouts.app>