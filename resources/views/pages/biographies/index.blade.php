<x-layouts.app active="biographies" title="Biografi Tokoh — Wilayah Zaid bin Tsabit" description="Daftar tokoh dan biografi pengurus Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Biografi Tokoh" eyebrow="Profil" description="Mengenal lebih dekat tokoh-tokoh yang mengemban amanah pembinaan Wilayah Zaid bin Tsabit." :breadcrumb="true" />

    <div class="container-app py-14">
        <form method="GET" action="{{ route('biographies.index') }}" class="reveal flex flex-col gap-4 rounded-2xl border border-line bg-surface p-5 sm:flex-row">
            <div class="relative flex-1">
                <label for="q" class="sr-only">Cari tokoh</label>
                <x-icon name="search" class="pointer-events-none absolute left-4 top-1/2 h-4.5 w-4.5 -translate-y-1/2 text-muted" />
                <input id="q" type="search" name="q" value="{{ $keyword }}" placeholder="Cari nama atau peran tokoh..."
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
                <a href="{{ route('biographies.index') }}" class="btn-ghost shrink-0 !px-4 text-[13px]">Reset</a>
            @endif
        </form>

        @if ($figures->isEmpty())
            <div class="mt-10">
                <x-empty-state icon="users" title="Tokoh tidak ditemukan" description="Tidak ada tokoh yang cocok dengan pencarian Anda. Coba kata kunci lain atau reset filter." action-label="Reset Pencarian" :action-url="route('biographies.index')" />
            </div>
        @else
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($figures as $figure)
                    <div class="reveal">
                        <x-figure-card :figure="$figure" />
                    </div>
                @endforeach
            </div>
            {{ $figures->links() }}
        @endif
    </div>

</x-layouts.app>