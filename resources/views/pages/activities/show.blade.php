<x-layouts.app active="activities" :title="$activity->title . ' — Wilayah Zaid bin Tsabit'" :description="$activity->description ?: 'Detail kegiatan Wilayah Zaid bin Tsabit.'">

    <div class="border-b border-line bg-surface">
        <div class="container-app py-10">
            <x-breadcrumb :items="[
                ['label' => 'Kegiatan', 'url' => route('activities.index')],
                ['label' => $activity->title],
            ]" />
            <div class="reveal max-w-3xl">
                <div class="flex flex-wrap items-center gap-3 text-xs text-muted">
                    <span class="tag {{ $activity->status === 'completed' ? 'bg-muted/10 text-muted' : ($activity->status === 'ongoing' ? 'bg-secondary text-white' : 'bg-secondary/10 text-secondary') }}">{{ $activity->status_label }}</span>
                    <span class="inline-flex items-center gap-1.5">
                        <x-icon name="calendar" class="h-3.5 w-3.5 text-secondary" />
                        <time datetime="{{ optional($activity->start_date)->toDateString() }}">{{ $activity->date_range }}</time>
                    </span>
                    @if ($activity->location)
                        <span class="inline-flex items-center gap-1.5">
                            <x-icon name="map-pin" class="h-3.5 w-3.5 text-secondary" />
                            {{ $activity->location }}
                        </span>
                    @endif
                </div>
                <h1 class="mt-4 font-serif text-3xl leading-tight text-primary sm:text-4xl text-balance">{{ $activity->title }}</h1>
            </div>
        </div>
    </div>

    <div class="container-app py-14">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <article class="reveal min-w-0 max-w-3xl">
                <div class="overflow-hidden rounded-2xl border border-line shadow-[0_8px_30px_rgba(11,43,38,0.1)]">
                    @if ($activity->image)
                        <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="aspect-[16/8] w-full object-cover">
                    @else
                        <x-placeholder-image label="Kegiatan" class="aspect-[16/8] w-full" />
                    @endif
                </div>

                @if ($activity->description)
                    <p class="mt-8 border-l-2 border-secondary pl-5 font-serif text-lg italic leading-8 text-primary/85">{{ $activity->description }}</p>
                @endif

                @if ($activity->content)
                    <div class="prose-zbs mt-8">{!! $activity->content !!}</div>
                @endif
            </article>

            <aside class="space-y-6">
                <div class="reveal rounded-2xl border border-line bg-surface p-6">
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">Detail Kegiatan</h3>
                    <dl class="mt-4 space-y-4 text-sm">
                        <div class="flex items-start gap-3">
                            <x-icon name="calendar" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-secondary" />
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-muted">Waktu</dt>
                                <dd class="mt-0.5 font-semibold text-primary">{{ $activity->date_range }}</dd>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <x-icon name="map-pin" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-secondary" />
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-muted">Lokasi</dt>
                                <dd class="mt-0.5 font-semibold text-primary">{{ $activity->location ?? 'Akan diumumkan' }}</dd>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <x-icon name="info" class="mt-0.5 h-4.5 w-4.5 shrink-0 text-secondary" />
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-muted">Status</dt>
                                <dd class="mt-0.5 font-semibold text-primary">{{ $activity->status_label }}</dd>
                            </div>
                        </div>
                    </dl>
                </div>
                <div class="reveal rounded-2xl border border-line bg-cream p-6 text-primary">
                    <x-icon name="calendar" class="h-6 w-6 text-secondary" />
                    <h3 class="mt-4 font-serif text-lg">Kalender Kegiatan</h3>
                    <p class="mt-2 text-[13px] leading-6 text-muted">Lihat seluruh agenda kegiatan dalam tampilan kalender bulanan.</p>
                    <a href="{{ route('activities.calendar') }}" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-primary">
                        Buka Kalender
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </aside>
        </div>

        @if ($others->isNotEmpty())
            <section class="mt-16">
                <div class="reveal flex items-end justify-between gap-4">
                    <x-section-heading eyebrow="Kegiatan Lainnya" title="Agenda Lainnya" />
                    <a href="{{ route('activities.index') }}" class="btn-outline mb-1 !px-4 !py-2.5 text-[13px]">Semua Kegiatan</a>
                </div>
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($others as $other)
                        <div class="reveal">
                            <x-activity-card :activity="$other" :compact="true" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

</x-layouts.app>