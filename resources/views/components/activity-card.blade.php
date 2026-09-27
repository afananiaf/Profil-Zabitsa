@props(['activity', 'compact' => false])

<article class="group flex h-full flex-col overflow-hidden rounded-3xl border border-line bg-surface transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_28px_60px_rgba(11,43,38,0.12)]">
    <a href="{{ route('activities.show', $activity->slug) }}" class="relative block overflow-hidden {{ $compact ? 'aspect-[16/9]' : 'aspect-[16/10]' }}" aria-label="Lihat kegiatan: {{ $activity->title }}">
        @if ($activity->image)
            <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" loading="lazy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
        @else
            <x-placeholder-image :label="'Kegiatan'" class="h-full w-full transition-transform duration-700 group-hover:scale-105" />
        @endif
        <span class="tag absolute left-4 top-4 {{ $activity->status === 'completed' ? 'bg-white/90 text-muted shadow-sm backdrop-blur' : ($activity->status === 'ongoing' ? 'bg-primary text-white' : 'bg-white/90 text-primary shadow-sm backdrop-blur') }}">
            {{ $activity->status_label }}
        </span>
    </a>
    <div class="flex flex-1 flex-col p-7">
        <div class="flex flex-wrap items-center gap-x-4 gap-y-1.5 text-xs text-muted">
            <span class="inline-flex items-center gap-1.5">
                <x-icon name="calendar" class="h-3.5 w-3.5 text-gold" />
                <time datetime="{{ optional($activity->start_date)->toDateString() }}">{{ $activity->date_range }}</time>
            </span>
            @if ($activity->location)
                <span class="inline-flex items-center gap-1.5">
                    <x-icon name="map-pin" class="h-3.5 w-3.5 text-gold" />
                    {{ $activity->location }}
                </span>
            @endif
        </div>
        <h3 class="mt-3 font-serif text-[21px] leading-snug text-primary transition-colors group-hover:text-secondary">
            <a href="{{ route('activities.show', $activity->slug) }}">{{ $activity->title }}</a>
        </h3>
        @if (!$compact)
            <p class="mt-3 line-clamp-2 text-[13.5px] leading-6 text-muted">{{ $activity->description }}</p>
        @endif
        <a href="{{ route('activities.show', $activity->slug) }}" class="mt-auto inline-flex items-center gap-2 pt-6 text-[13px] font-bold text-primary transition-colors group-hover:text-gold">
            Lihat Detail
            <x-icon name="arrow-right" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-1" />
        </a>
    </div>
</article>