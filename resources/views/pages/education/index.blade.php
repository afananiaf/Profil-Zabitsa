<x-layouts.app active="education" title="Jenjang Pendidikan — Wilayah Zaid bin Tsabit" description="Daftar jenjang dan program pendidikan yang diselenggarakan Wilayah Zaid bin Tsabit.">

    <x-page-hero title="Jenjang Pendidikan" eyebrow="Pendidikan" description="Jenjang dan program pendidikan yang diselenggarakan dalam lingkungan Wilayah Zaid bin Tsabit." :breadcrumb="true" />

    <div class="container-app py-14">
        <div class="grid gap-14 lg:grid-cols-[0.9fr_1.1fr] lg:gap-24">
            <div class="reveal lg:sticky lg:top-32 lg:self-start">
                <h2 class="section-title text-balance">Struktur Kurikulum yang Berkesinambungan</h2>
                <p class="mt-5 text-[15px] leading-8 text-muted">
                    Kurikulum Madrasah Diniyah Al-Insyiroh dirancang berjenjang dan bersambung — dari Sifir, I'dadiyah, Awaliyah, Wustho, hingga Ulya — dengan total estimasi masa belajar sekitar 11 tahun 5 bulan.
                </p>
                <div class="mt-8 rounded-2xl border border-line bg-cream p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary/10 text-secondary">
                            <x-icon name="clock" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-muted">Estimasi Total</p>
                            <p class="font-serif text-lg text-primary">11 Tahun 5 Bulan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="grid gap-5 sm:grid-cols-2">
                    @forelse ($levels as $level)
                        <div class="reveal">
                            <x-education-card :level="$level" />
                        </div>
                    @empty
                        <div class="col-span-full">
                            <x-empty-state icon="graduation-cap" title="Informasi jenjang menyusul" description="Detail jenjang pendidikan akan diumumkan oleh pengurus." />
                        </div>
                    @endforelse
                </div>
                {{ $levels->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>