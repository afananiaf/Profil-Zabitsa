<x-layouts.app active="activities" title="Kegiatan — Wilayah Zaid bin Tsabit" description="Agenda dan dokumentasi kegiatan Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Kegiatan" eyebrow="Agenda" description="Agenda kegiatan yang sedang berjalan, akan datang, serta dokumentasi kegiatan yang telah dilaksanakan." :breadcrumb="true" />

    <div class="container-app py-14">

        @if ($featured)
            <div class="reveal">
                <article class="group grid overflow-hidden rounded-2xl border border-line bg-surface lg:grid-cols-2">
                    <a href="{{ route('activities.show', $featured->slug) }}" class="relative block overflow-hidden" aria-label="Lihat kegiatan unggulan: {{ $featured->title }}">
                        @if ($featured->image)
                            <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}" class="h-full min-h-[250px] w-full object-cover">
                        @else
                            <x-placeholder-image label="Kegiatan Unggulan" tone="secondary" class="h-full min-h-[250px] w-full" />
                        @endif
                        <span class="tag absolute left-4 top-4 bg-primary text-white">Kegiatan Unggulan</span>
                    </a>
                    <div class="flex flex-col justify-center p-7 sm:p-10">
                        <div class="flex flex-wrap items-center gap-3 text-xs text-muted">
                            <span class="tag {{ $featured->status === 'completed' ? 'bg-muted/10 text-muted' : ($featured->status === 'ongoing' ? 'bg-secondary text-white' : 'bg-secondary/10 text-secondary') }}">{{ $featured->status_label }}</span>
                            <span class="inline-flex items-center gap-1.5">
                                <x-icon name="calendar" class="h-3.5 w-3.5 text-secondary" />
                                <time datetime="{{ optional($featured->start_date)->toDateString() }}">{{ $featured->date_range }}</time>
                            </span>
                            @if ($featured->location)
                                <span class="inline-flex items-center gap-1.5">
                                    <x-icon name="map-pin" class="h-3.5 w-3.5 text-secondary" />
                                    {{ $featured->location }}
                                </span>
                            @endif
                        </div>
                        <h2 class="mt-4 font-serif text-2xl leading-snug text-primary sm:text-3xl text-balance">
                            <a href="{{ route('activities.show', $featured->slug) }}" class="transition-colors group-hover:text-secondary">{{ $featured->title }}</a>
                        </h2>
                        <p class="mt-4 line-clamp-3 text-[14.5px] leading-7 text-muted">{{ $featured->description }}</p>
                        <a href="{{ route('activities.show', $featured->slug) }}" class="mt-6 inline-flex items-center gap-1.5 text-[13.5px] font-bold text-secondary transition-colors hover:text-primary">
                            Lihat Detail
                            <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </a>
                    </div>
                </article>
            </div>
        @endif

        @if ($upcoming->isNotEmpty())
            <section class="mt-16">
                <x-section-heading eyebrow="Agenda Mendatang" title="Kegiatan Akan Datang" />
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($upcoming as $activity)
                        <div class="reveal">
                            <x-activity-card :activity="$activity" />
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 text-right">
                    <a href="{{ route('activities.calendar') }}" class="inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-primary">
                        Lihat Kalender Kegiatan
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </section>
        @endif

        @if ($all->isNotEmpty())
            <section class="mt-16">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <x-section-heading eyebrow="Dokumentasi" title="Seluruh Kegiatan" />
                    <a href="{{ route('activities.calendar') }}" class="btn-outline mb-1 !px-4 !py-2.5 text-[13px]">
                        <x-icon name="calendar" class="h-4 w-4" />
                        Kalender
                    </a>
                </div>
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($all as $activity)
                        <div class="reveal">
                            <x-activity-card :activity="$activity" />
                        </div>
                    @endforeach
                </div>
                {{ $all->links() }}
            </section>
        @endif

        @if ($past->isNotEmpty())
            <section class="mt-16">
                <x-section-heading eyebrow="Telah Dilaksanakan" title="Kegiatan Terdahulu" />
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($past as $activity)
                        <div class="reveal">
                            <x-activity-card :activity="$activity" :compact="true" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($all->isEmpty() && $upcoming->isEmpty() && $past->isEmpty() && !$featured)
            <div class="mt-10">
                <x-empty-state icon="calendar" title="Belum ada kegiatan" description="Agenda kegiatan akan segera diumumkan oleh pengurus." />
            </div>
        @endif
    </div>

</x-layouts.app>