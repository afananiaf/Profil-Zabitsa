<x-layouts.app active="biographies" :title="$figure->name . ' — Wilayah Zaid bin Tsabit'" :description="$figure->short_bio ?: 'Biografi tokoh Wilayah Zaid bin Tsabit.'">

    <div class="border-b border-line bg-surface">
        <div class="container-app py-10">
            <x-breadcrumb :items="[
                ['label' => 'Biografi', 'url' => route('biographies.index')],
                ['label' => $figure->name],
            ]" />
            <div class="reveal flex flex-col items-start gap-8 sm:flex-row sm:items-center">
                <span class="relative shrink-0 overflow-hidden rounded-full border-4 border-cream shadow-md">
                    @if ($figure->photo)
                        <img src="{{ asset('storage/' . $figure->photo) }}" alt="{{ $figure->name }}" class="h-32 w-32 object-cover">
                    @else
                        <span class="flex h-32 w-32 items-center justify-center bg-gradient-to-b from-secondary to-primary font-serif text-4xl font-bold text-white">{{ $figure->initials }}</span>
                    @endif
                </span>
                <div>
                    <h1 class="font-serif text-3xl text-primary sm:text-4xl">{{ $figure->name }}</h1>
                    @if ($figure->role)
                        <p class="mt-2 text-[12px] font-bold uppercase tracking-[0.18em] text-muted">{{ $figure->role }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container-app py-14">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <article class="reveal max-w-3xl">
                @if ($figure->bio)
                    <div class="prose-zbs">{!! $figure->bio !!}</div>
                @else
                    <p class="text-[15px] leading-8 text-muted">Biografi resmi tokoh ini akan dilengkapi oleh pengurus dengan informasi yang sah dan dapat dipertanggungjawabkan.</p>
                @endif

                @if ($figure->education)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="graduation-cap" class="h-5 w-5" /></span>
                            Riwayat Pendidikan
                        </h2>
                        <div class="prose-zbs mt-5">{!! $figure->education !!}</div>
                    </section>
                @endif

                @if ($figure->journey)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="compass" class="h-5 w-5" /></span>
                            Perjalanan
                        </h2>
                        <div class="prose-zbs mt-5">{!! $figure->journey !!}</div>
                    </section>
                @endif

                @if ($figure->contributions)
                    <section class="mt-12 border-t border-line pt-8">
                        <h2 class="flex items-center gap-3 font-serif text-2xl text-primary">
                            <span class="flex h-10 w-10 items-center justify-center rounded-md bg-primary/10 text-secondary"><x-icon name="award" class="h-5 w-5" /></span>
                            Kontribusi
                        </h2>
                        <div class="prose-zbs mt-5">{!! $figure->contributions !!}</div>
                    </section>
                @endif
            </article>

            <aside class="space-y-6">
                <div class="reveal rounded-2xl border border-line bg-surface p-6">
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">Informasi Tokoh</h3>
                    <dl class="mt-4 space-y-4 text-sm">
                        @if ($figure->category)
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-muted">Kategori</dt>
                                <dd class="mt-1 font-semibold text-primary">{{ ucfirst($figure->category) }}</dd>
                            </div>
                        @endif
                        @if ($figure->role)
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-muted">Peran</dt>
                                <dd class="mt-1 font-semibold text-primary">{{ $figure->role }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
                <div class="reveal rounded-2xl border border-line bg-cream p-6 text-primary">
                    <x-icon name="users" class="h-6 w-6 text-secondary" />
                    <h3 class="mt-4 font-serif text-lg">Lihat Tokoh Lainnya</h3>
                    <p class="mt-2 text-[13px] leading-6 text-muted">Jelajahi biografi tokoh lain yang mengemban amanah di wilayah.</p>
                    <a href="{{ route('biographies.index') }}" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-primary">
                        Daftar Tokoh
                        <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                    </a>
                </div>
            </aside>
        </div>

        @if ($others->isNotEmpty())
            <section class="mt-16">
                <div class="reveal flex items-end justify-between gap-4">
                    <x-section-heading eyebrow="Tokoh Lainnya" title="Biografi Lainnya" />
                    <a href="{{ route('biographies.index') }}" class="btn-outline mb-1 !px-4 !py-2.5 text-[13px]">Semua Tokoh</a>
                </div>
                <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($others as $other)
                        <div class="reveal">
                            <x-figure-card :figure="$other" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>

</x-layouts.app>