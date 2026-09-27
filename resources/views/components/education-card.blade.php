@props(['level'])

<article class="group flex h-full flex-col rounded-2xl border border-line bg-surface p-7 shadow-[0_1px_3px_rgba(11,43,38,0.04)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/25 hover:shadow-[0_16px_36px_rgba(11,43,38,0.1)]">
    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary/8 text-secondary transition-colors duration-300 group-hover:bg-primary group-hover:text-white">
        <x-icon :name="$level->icon ?: 'graduation-cap'" class="h-6 w-6" />
    </span>
    <h3 class="mt-5 text-[20px] leading-snug text-primary">
        <a href="{{ route('education.show', $level->slug) }}" class="transition-colors group-hover:text-secondary">{{ $level->name }}</a>
    </h3>
    @if ($level->short_name)
        <p class="mt-1 text-[11px] font-bold uppercase tracking-[0.18em] text-muted">{{ $level->short_name }}</p>
    @endif
    @if ($level->description)
        <p class="mt-3 line-clamp-3 text-[13.5px] leading-6 text-muted">{{ $level->description }}</p>
    @endif
    @if ($level->duration)
        <p class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-primary/8 px-3 py-1 text-[11.5px] font-semibold text-secondary">
            <x-icon name="clock" class="h-3.5 w-3.5" />
            {{ $level->duration }}
        </p>
    @endif
    <div class="mt-auto border-t border-line pt-5">
        <a href="{{ route('education.show', $level->slug) }}" class="inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary transition-colors hover:text-primary">
            Lihat Detail Kurikulum
            <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
        </a>
    </div>
</article>