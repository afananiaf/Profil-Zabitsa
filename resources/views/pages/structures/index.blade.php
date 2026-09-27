<x-layouts.app active="structures" title="Struktur Wilayah — Wilayah Zaid bin Tsabit" description="Bagan organisasi dan deskripsi peran Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Struktur Wilayah" eyebrow="Organisasi" description="Bagan organisasi dan pembagian peran dalam kepengurusan Wilayah Zaid bin Tsabit." :breadcrumb="true" />

    <div class="container-app py-14">
        <div id="bagan">
            @if ($nodes->isEmpty())
                <x-empty-state icon="users" title="Struktur organisasi menyusul" description="Bagan organisasi akan dipublikasikan oleh pengurus." />
            @else
                @php
                    $generationNames = ['Pengarah & Pengawas', 'Pimpinan Eksekutif', 'Pelaksana Teknis'];
                @endphp
                <div class="space-y-0">
                    @foreach ($nodes as $generation => $members)
                        <div class="flex flex-col items-center">
                            @if (!$loop->first)
                                <div class="flex flex-col items-center" aria-hidden="true">
                                    <span class="h-12 w-px bg-gradient-to-b from-line to-gold/50"></span>
                                    <span class="-mt-px h-2.5 w-2.5 rotate-45 border border-gold/60 bg-cream"></span>
                                </div>
                            @endif

                            <div class="w-full">
                                <div class="mb-8 flex flex-col items-center text-center">
                                    <h3 class="font-serif text-[28px] leading-snug text-primary">
                                        {{ $generationNames[$generation] ?? 'Tingkat ' . ($generation + 1) }}
                                    </h3>
                                    <span class="mt-4 h-px w-20 bg-gold" aria-hidden="true"></span>
                                </div>

                                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                                    @foreach ($members as $node)
                                        @php
                                            $initials = collect(preg_split('/\s+/', trim($node->name ?? '')))
                                                ->take(2)
                                                ->map(fn ($w) => mb_substr($w, 0, 1))
                                                ->implode('');
                                            $initials = strtoupper($initials ?: 'ZT');
                                        @endphp
                                        <div class="group relative flex flex-col items-center rounded-[18px] border border-line bg-surface px-5 py-7 text-center shadow-[0_1px_3px_rgba(11,43,38,0.05)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-[0_20px_45px_rgba(11,43,38,0.12)]">
                                            <span class="w-full rounded-[18px] bg-gradient-to-b from-gold/70 to-line p-1.5" aria-hidden="true">
                                                @if ($node->photo)
                                                    <img src="{{ asset('storage/' . $node->photo) }}" alt="{{ $node->name }}" loading="lazy" class="aspect-square w-full rounded-[12px] border border-cream object-cover">
                                                @else
                                                    <span class="flex aspect-square w-full items-center justify-center rounded-[12px] bg-gradient-to-b from-secondary to-primary font-serif text-[30px] font-bold text-goldlight">{{ $initials }}</span>
                                                @endif
                                            </span>
                                            <p class="mt-5 font-serif text-[16px] font-bold leading-snug text-primary">{{ $node->name }}</p>
                                            <span class="mt-2.5 h-px w-8 bg-gold/60" aria-hidden="true"></span>
                                            <p class="mt-2.5 text-[10.5px] font-bold uppercase tracking-[0.16em] text-secondary">{{ $node->position }}</p>
                                            @if ($node->description)
                                                <p class="mt-3 px-2 text-[12px] leading-6 text-muted">{{ $node->description }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</x-layouts.app>