<nav class="grid grid-cols-2 gap-3.5 md:grid-cols-4 xl:grid-cols-8" aria-label="Navigasi cepat">
    @foreach ($items as $item)
        <a href="{{ $item['url'] }}"
            class="group relative flex flex-col rounded-2xl border border-line bg-surface p-4 shadow-[0_1px_3px_rgba(11,43,38,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/25 hover:shadow-[0_16px_36px_rgba(11,43,38,0.1)] sm:p-5">
            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-primary/8 text-secondary transition-all duration-300 group-hover:bg-primary group-hover:text-white">
                <x-icon :name="$item['icon']" class="h-5 w-5" />
            </span>
            <span class="mt-3.5 block text-[14.5px] font-bold leading-snug text-primary">{{ $item['title'] }}</span>
            <span class="mt-1.5 block text-[11.5px] leading-5 text-muted">{{ $item['text'] }}</span>
            <span class="mt-3 inline-flex items-center gap-1 text-[12px] font-bold text-secondary">
                Buka
                <x-icon name="arrow-right" class="h-3 w-3 transition-transform duration-300 group-hover:translate-x-1" />
            </span>
        </a>
    @endforeach
</nav>