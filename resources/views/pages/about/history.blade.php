<x-layouts.app active="about" title="Sejarah Wilayah — Wilayah Zaid bin Tsabit" description="Perjalanan Wilayah Zaid bin Tsabit dan Madrasah Diniyah Al-Insyiroh dalam membina generasi Qur'ani, berilmu, dan berakhlakul karimah.">

    <x-page-hero title="Sejarah Wilayah" eyebrow="Tentang Kami" description="Perjalanan panjang Wilayah Zaid bin Tsabit dalam mengemban amanah pembinaan dan pendidikan." :breadcrumb="true" parent="Tentang Kami" />

    <div class="container-app py-14 sm:py-16">
        <div class="grid gap-12 lg:grid-cols-[1fr_320px]">
            <article class="reveal max-w-3xl">
                <h2 class="section-title text-balance">Perjalanan Wilayah Zaid bin Tsabit &amp; Madrasah Diniyah Al-Insyiroh</h2>

                <div class="prose-zbs mt-8">
                    <p>
                        Wilayah Zaid bin Tsabit merupakan salah satu <strong>wilayah satelit</strong> Pondok Pesantren Nurul Jadid — terpisah dari pondok pusat dengan jarak sekitar 500 meter ke arah barat laut. Wilayah ini memiliki sistem pengelolaan kegiatan tersendiri dalam membina santri, namun tetap berada di bawah naungan Pondok Pesantren Nurul Jadid.
                    </p>

                    <h2>Perintisan Wilayah</h2>
                    <p>
                        Wilayah ini dirintis oleh <strong>KH. Moh. Hefni Mahfudz</strong> (menantu KH. Hasan Abdul Wafi dan keponakan KH. Moh. Zuhri Zaini) pada tanggal <strong>26 Januari 2000 M / 19 Syawal 1420 H</strong>.
                    </p>
                    <p>
                        Pada awalnya, program yang ada hanya <strong>Tahfidzul Qur'an</strong>. Kini wilayah telah berkembang dengan berbagai program pendidikan, di antaranya Tahfidzul Qur'an, Tahsinul Qiro'ah, Amtsilati, Excellent Language, dan <strong>Madrasah Diniyah Al-Insyiroh</strong> (dirintis pada 24 Januari 2002 oleh Ust. Umar Faruq).
                    </p>

                    <h2>Perkembangan</h2>
                    <p>
                        Sejak awal berdiri hingga sekarang, wilayah ini mengalami perkembangan yang cukup signifikan — baik dari segi jumlah santri, fasilitas, kualitas pendidikan, maupun prestasi. Hal ini berdampak pada meningkatnya minat masyarakat untuk mendaftarkan putranya setiap tahun.
                    </p>

                    <h2>Program Unggulan</h2>
                    <ul>
                        <li>Tahfidzul Qur'an</li>
                        <li>Tahsinul Qiro'ah</li>
                        <li>Amtsilati</li>
                        <li>Excellent Language</li>
                        <li>Madrasah Diniyah Al-Insyiroh</li>
                    </ul>

                    <h2>Komitmen Kami</h2>
                    <p>
                        Wilayah Zaid bin Tsabit berkomitmen menjaga amanah pendidikan dengan berlandaskan Al-Qur'an dan Sunnah, menanamkan akhlak mulia, serta mencetak santri dan kader dakwah yang Qur'ani, berilmu, dan berakhlakul karimah.
                    </p>
                </div>
            </article>

            <aside class="space-y-6">
                <div class="reveal rounded-2xl border border-line bg-surface p-6">
                    <h3 class="text-[11px] font-bold uppercase tracking-[0.18em] text-muted">Menu Tentang</h3>
                    <ul class="mt-4 space-y-1">
                        <li>
                            <a href="{{ route('about.history') }}" class="flex items-center justify-between rounded-md bg-cream px-3 py-2.5 text-sm font-bold text-primary">
                                Sejarah Wilayah
                                <x-icon name="chevron-right" class="h-4 w-4" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about.vision') }}" class="flex items-center justify-between rounded-md px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-cream hover:text-primary">
                                Visi & Misi
                                <x-icon name="chevron-right" class="h-4 w-4 opacity-40" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('biographies.index') }}" class="flex items-center justify-between rounded-md px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-cream hover:text-primary">
                                Biografi Tokoh
                                <x-icon name="chevron-right" class="h-4 w-4 opacity-40" />
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('structures.index') }}" class="flex items-center justify-between rounded-md px-3 py-2.5 text-sm font-medium text-muted transition-colors hover:bg-cream hover:text-primary">
                                Struktur Wilayah
                                <x-icon name="chevron-right" class="h-4 w-4 opacity-40" />
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="reveal space-y-4 rounded-2xl border border-line bg-cream p-6 text-primary">
                    <div class="flex items-start gap-3">
                        <x-icon name="map-pin" class="mt-0.5 h-5 w-5 shrink-0 text-secondary" />
                        <p class="text-[13px] leading-6 text-ink/85">Dusun Tanjung Lor, Desa Karanganyar, Kecamatan Paiton, Kabupaten Probolinggo · ±500 m barat laut dari pondok pusat</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <x-icon name="calendar" class="mt-0.5 h-5 w-5 shrink-0 text-secondary" />
                        <p class="text-[13px] leading-6 text-ink/85">Dirintis 26 Januari 2000 M · 19 Syawal 1420 H oleh KH. Moh. Hefni Mahfudz</p>
                    </div>
                </div>
            </aside>
        </div>
    </div>

</x-layouts.app>