<x-layouts.app active="activities" title="Kalender Kegiatan — Wilayah Zaid bin Tsabit" description="Kalender kegiatan Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Kalender Kegiatan" eyebrow="Agenda" description="Kalender kegiatan Wilayah Zaid bin Tsabit per bulan." :breadcrumb="true" parent="Kegiatan" />

    <div class="container-app py-14">
        <div class="reveal flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-serif text-2xl text-primary">{{ $firstDay->translatedFormat('F Y') }}</h2>
            <div class="flex gap-2">
                <a href="{{ route('activities.calendar', ['month' => $prev->month, 'year' => $prev->year]) }}" class="btn-outline !px-4 !py-2.5 text-[13px]" aria-label="Bulan sebelumnya">
                    <x-icon name="chevron-left" class="h-4 w-4" />
                    {{ $prev->translatedFormat('M') }}
                </a>
                <a href="{{ route('activities.calendar') }}" class="btn-ghost !px-4 !py-2.5 text-[13px]">Bulan Ini</a>
                <a href="{{ route('activities.calendar', ['month' => $next->month, 'year' => $next->year]) }}" class="btn-outline !px-4 !py-2.5 text-[13px]" aria-label="Bulan berikutnya">
                    {{ $next->translatedFormat('M') }}
                    <x-icon name="chevron-right" class="h-4 w-4" />
                </a>
            </div>
        </div>

        <div class="reveal mt-8 overflow-hidden rounded-2xl border border-line bg-surface shadow-[0_1px_3px_rgba(11,43,38,0.05)]">
            <div class="grid grid-cols-7 border-b border-line bg-cream/60">
                @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $day)
                    <div class="px-2 py-3 text-center text-[11px] font-bold uppercase tracking-wider text-muted">{{ $day }}</div>
                @endforeach
            </div>
            <div class="divide-y divide-line">
                @foreach ($weeks as $week)
                    <div class="grid grid-cols-7">
                        @foreach ($week as $cell)
                            @if ($cell)
                                <div class="relative min-h-[92px] border-r border-line p-1.5 last:border-r-0 sm:min-h-[110px] sm:p-2 {{ $cell->today ? 'bg-secondary/10' : '' }}">
                                    <span class="inline-flex h-7 w-7 items-center justify-center rounded-full text-[13px] font-semibold {{ $cell->today ? 'bg-primary text-white' : 'text-ink/70' }}">
                                        {{ $cell->day }}
                                    </span>
                                    <div class="mt-1 space-y-1">
                                        @foreach ($cell->items as $activity)
                                            <a href="{{ route('activities.show', $activity->slug) }}" title="{{ $activity->title }}"
                                                class="block truncate rounded-sm bg-primary/10 px-1.5 py-1 text-[10.5px] font-semibold leading-tight text-primary transition-colors hover:bg-primary hover:text-white">
                                                {{ $activity->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="min-h-[92px] border-r border-line/60 bg-cream/40 last:border-r-0 sm:min-h-[110px]" aria-hidden="true"></div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <p class="mt-4 text-xs text-muted">Tanggal dengan <span class="font-semibold text-primary">tanda kegiatan</span> menampilkan agenda yang berlangsung pada bulan tersebut.</p>

        @if ($activities->isNotEmpty())
            <section class="mt-12">
                <x-section-heading eyebrow="Agenda Bulan Ini" title="Daftar Kegiatan" />
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($activities as $activity)
                        <div class="reveal">
                            <x-activity-card :activity="$activity" :compact="true" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

</x-layouts.app>