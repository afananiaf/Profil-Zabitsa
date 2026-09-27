@props([
    'icon' => 'file-text',
    'title' => '',
    'description' => '',
    'url' => '#',
    'imageLabel' => 'Dokumentasi Wilayah',
    'tone' => 'primary',
])

<a href="{{ $url }}"
    class="group relative flex h-full flex-col overflow-hidden rounded-3xl border border-line bg-surface p-7 shadow-[0_2px_10px_rgba(11,43,38,0.04)] transition-all duration-500 hover:-translate-y-1 hover:border-primary/25 hover:shadow-[0_28px_60px_rgba(11,43,38,0.12)]">
    <span class="flex items-center justify-center rounded-2xl bg-primary/8 text-secondary transition-colors duration-300 group-hover:bg-primary group-hover:text-white" style="height:3.25rem;width:3.25rem">
        <x-icon :name="$icon" class="h-6 w-6" />
    </span>
    <span class="mt-6 block font-serif text-[20px] font-semibold leading-snug text-primary">{{ $title }}</span>
    <span class="mt-2.5 block text-[13.5px] leading-6 text-muted">{{ $description }}</span>
    <span class="mt-auto inline-flex items-center gap-2 pt-6 text-[13px] font-bold text-primary">
        Lihat Detail
        <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
    </span>
</a>