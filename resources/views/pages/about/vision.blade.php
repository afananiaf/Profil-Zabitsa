<x-layouts.app active="about" title="Visi & Misi — Wilayah Zaid bin Tsabit" description="Visi dan misi Madrasah Diniyah Al-Insyiroh Wilayah Zaid bin Tsabit dalam membina santri dan kader dakwah.">

    <x-page-hero title="Visi & Misi" eyebrow="Tentang Kami" description="Arah perjalanan dan komitmen Wilayah Zaid bin Tsabit dalam membina generasi." :breadcrumb="true" parent="Tentang Kami" />

    <div class="container-app py-16">
        <div class="reveal max-w-2xl">
            <h2 class="section-title text-balance">Arah dan Komitmen Wilayah</h2>
            <p class="mt-5 text-[15.5px] leading-8 text-muted">
                Visi, misi, dan tujuan berikut merupakan rumusan resmi yang menjadi pedoman seluruh program pendidikan dan pembinaan Madrasah Diniyah Al-Insyiroh.
            </p>
        </div>

        <div class="mt-14 grid gap-8 lg:grid-cols-2">
            <section class="reveal rounded-2xl border border-line bg-surface p-8 sm:p-10">
                <span class="flex h-12 w-12 items-center justify-center rounded-md bg-primary/10 text-secondary">
                    <x-icon name="target" class="h-6 w-6" />
                </span>
                <h3 class="mt-6 font-serif text-2xl text-primary">Visi</h3>
                <p class="mt-6 font-serif text-[21px] leading-relaxed text-primary/90 text-balance">
                    "Terciptanya santri dan kader dakwah yang Qur'ani, berilmu dan berakhlakul karimah"
                </p>
            </section>

            <section class="reveal rounded-2xl border border-line bg-surface p-8 sm:p-10" style="transition-delay: 100ms">
                <span class="flex h-12 w-12 items-center justify-center rounded-md bg-primary/10 text-secondary">
                    <x-icon name="compass" class="h-6 w-6" />
                </span>
                <h3 class="mt-6 font-serif text-2xl text-primary">Misi</h3>
                <ul class="mt-6 space-y-4">
                    @php
                        $misis = [
                            'Menyiapkan santri yang menjadi Mu\'allimil Qur\'an dan Hafidzul Qur\'an.',
                            'Menyiapkan santri yang terampil dalam berdakwah menggunakan bahasa asing.',
                            'Menyiapkan santri yang mampu membaca dan mengajarkan kitab salaf yang berhaluan Ahlussunnah wal Jama\'ah.',
                            'Membekali santri dengan ibadah, amaliyah dan akhlakul karimah.',
                        ];
                    @endphp
                    @foreach ($misis as $index => $misi)
                        <li class="flex items-start gap-3 text-[14.5px] leading-7 text-ink/85">
                            <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-[12px] font-bold text-secondary">{{ $index + 1 }}</span>
                            {{ $misi }}
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

        <div class="reveal mt-14 grid gap-8 lg:grid-cols-2">
            <section class="rounded-2xl border border-line bg-cream p-8 sm:p-10">
                <span class="flex h-12 w-12 items-center justify-center rounded-md bg-primary/10 text-secondary">
                    <x-icon name="shield-check" class="h-6 w-6" />
                </span>
                <h3 class="mt-6 font-serif text-2xl text-primary">Tujuan</h3>
                <ul class="mt-6 space-y-4">
                    @php
                        $tujuans = [
                            'Menghasilkan santri dengan pribadi yang saleh, mandiri, berilmu, berjuang dan berbakti kepada agama, masyarakat dan bangsa.',
                            'Menghasilkan santri yang memiliki akhlak dan keilmuan yang siap menyongsong kejayaan Islam.',
                        ];
                    @endphp
                    @foreach ($tujuans as $index => $tujuan)
                        <li class="flex items-start gap-3 text-[14.5px] leading-7 text-ink/85">
                            <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-[12px] font-bold text-secondary">{{ $index + 1 }}</span>
                            {{ $tujuan }}
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="rounded-2xl border border-line bg-surface p-8 sm:p-10">
                <div class="flex flex-col items-start gap-6 sm:flex-row">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-md bg-primary/10 text-secondary">
                        <x-icon name="award" class="h-6 w-6" />
                    </span>
                    <div>
                        <h3 class="font-serif text-xl text-primary">Nilai-Nilai yang Dijaga</h3>
                        <p class="mt-3 max-w-3xl text-[14.5px] leading-7 text-muted">
                            Seluruh program dijalankan dengan berlandaskan Al-Qur'an dan Sunnah, menjunjung tinggi keilmuan, kejujuran, amanah, ukhuwah, serta kemaslahatan umat. Nilai-nilai ini menjadi pedoman dalam setiap langkah pengurus, pengasuh, dan santri.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

</x-layouts.app>