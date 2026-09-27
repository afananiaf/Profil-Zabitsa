<x-layouts.app active="education" :title="$level->name . ' — Wilayah Zaid bin Tsabit'" :description="$level->description ?: 'Detail jenjang pendidikan Wilayah Zaid bin Tsabit.'">

    <x-page-hero :title="$level->name" eyebrow="Jenjang Pendidikan" :description="$level->description" :breadcrumb="true" parent="Pendidikan" />

    <div class="container-app py-14">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <article class="reveal max-w-3xl">
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 items-center justify-center rounded-md bg-primary/10 text-secondary">
                        <x-icon :name="$level->icon ?: 'graduation-cap'" class="h-7 w-7" />
                    </span>
                    <div>
                        <h2 class="flex items-center flex-wrap gap-3 font-serif text-2xl text-primary">
                            Overview
                            @if ($level->duration)
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-primary/8 px-3 py-1 text-[12px] font-semibold text-secondary">
                                    <x-icon name="clock" class="h-3.5 w-3.5" />
                                    {{ $level->duration }}
                                </span>
                            @endif
                        </h2>
                        @if ($level->short_name)
                            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">{{ $level->short_name }}</p>
                        @endif
                    </div>
                </div>

                @if ($level->overview)
                    <div class="prose-zbs mt-6">{!! $level->overview !!}</div>
                @endif

                @if ($level->objectives)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="target" class="h-5 w-5" /></span>
                            Tujuan
                        </h2>
                        <div class="prose-zbs mt-5">{!! $level->objectives !!}</div>
                    </section>
                @endif

                @if ($level->curriculum)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="book-open" class="h-5 w-5" /></span>
                            Kurikulum
                        </h2>
                        <div class="prose-zbs mt-5">{!! $level->curriculum !!}</div>
                    </section>
                @endif

                @if ($level->programs)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="layers" class="h-5 w-5" /></span>
                            Program
                        </h2>
                        <div class="prose-zbs mt-5">{!! $level->programs !!}</div>
                    </section>
                @endif

                @if ($level->activities)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="calendar" class="h-5 w-5" /></span>
                            Kegiatan
                        </h2>
                        <div class="prose-zbs mt-5">{!! $level->activities !!}</div>
                    </section>
                @endif

                @if ($level->info)
                    <section class="mt-12 rounded-2xl border border-line bg-cream p-6">
                        <h2 class="flex items-center gap-3 font-serif text-xl text-primary">
                            <span class="flex h-9 w-9 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="info" class="h-4.5 w-4.5" /></span>
                            Informasi Lainnya
                        </h2>
                        <div class="prose-zbs mt-4">{!! $level->info !!}</div>
                    </section>
                @endif
            </article>

            <aside class="space-y-6">
                <div class="reveal rounded-2xl border border-line bg-surface p-6">
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">Jenjang Lainnya</h3>
                    <ul class="mt-4 space-y-1">
                        @foreach ($others as $other)
                            <li>
                                <a href="{{ route('education.show', $other->slug) }}" class="group flex items-center gap-3 rounded-md px-3 py-2.5 transition-colors hover:bg-cream">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-md bg-primary/10 text-secondary transition-colors group-hover:bg-primary group-hover:text-primary">
                                        <x-icon :name="$other->icon ?: 'graduation-cap'" class="h-4 w-4" />
                                    </span>
                                    <span class="text-sm font-semibold text-ink/85 group-hover:text-primary">{{ $other->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('education.index') }}" class="mt-2 inline-flex items-center gap-1.5 px-3 text-[13px] font-bold text-secondary hover:text-primary">
                                Semua Jenjang
                                <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="reveal rounded-2xl border border-line bg-cream p-6 text-primary">
                    <x-icon name="calendar" class="h-6 w-6 text-secondary" />
                    <h3 class="mt-4 font-serif text-lg">Kegiatan Wilayah</h3>
                    <p class="mt-2 text-[13px] leading-6 text-muted">Lihat agenda kegiatan yang sedang berjalan dan akan datang.</p>
                    <a href="{{ route('activities.index') }}" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-primary">
                        Lihat Kegiatan
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </aside>
        </div>
    </div>

</x-layouts.app>