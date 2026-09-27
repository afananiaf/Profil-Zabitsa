@php
    $address = \App\Models\Setting::get('contact_address', 'Alamat resmi Wilayah Zaid bin Tsabit (akan diperbarui)');
    $email = \App\Models\Setting::get('contact_email', 'info@wilayahzaidbintsabit.id');
    $phone = \App\Models\Setting::get('contact_phone', '(62) 000 0000 0000');
    $siteLogo = \App\Models\Setting::get('site_logo');
    $socials = [
        'facebook' => 'https://www.facebook.com/zabitsa.nj',
        'youtube' => 'https://www.youtube.com/@zabitsa_nj',
        'instagram' => 'https://www.instagram.com/zabitsamedia/',
        'tiktok' => 'https://www.tiktok.com/@zabitsa.nj',
    ];
@endphp

<footer class="relative overflow-hidden bg-dark text-white/75">
    <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-gold/50 to-transparent" aria-hidden="true"></div>

    <div class="container-app relative grid gap-12 py-20 md:grid-cols-2 lg:grid-cols-12">

        {{-- Kolom 1 : Tentang & Copyright --}}
        <div class="lg:col-span-5">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3" aria-label="Wilayah Zaid bin Tsabit — Beranda">
                <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full border border-white/10 bg-white/5 text-goldlight" aria-hidden="true">
                    @if (!empty($siteLogo))
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo Wilayah Zaid bin Tsabit" class="h-full w-full rounded-full object-cover">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-8 w-8">
                            <g stroke="#ffffff" stroke-width="1.3">
                                <circle cx="22" cy="22" r="19" opacity="0.5" />
                                <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.9" />
                            </g>
                            <path d="M22 15.5l2.6 5 5 2.6-5 2.6-2.6 5-2.6-5-5-2.6 5-2.6z" fill="#ffffff" opacity="0.85" />
                        </svg>
                    @endif
                </span>
                <span class="leading-none">
                    <span class="block font-serif text-[16px] font-semibold tracking-wide text-white">WILAYAH <span class="text-goldlight">ZAID BIN TSABIT</span></span>
                    <span class="mt-1 block text-[9px] font-medium uppercase tracking-[0.22em] text-white/45">Profil, Informasi &amp; Dokumentasi Wilayah</span>
                </span>
            </a>
            <p class="mt-6 max-w-sm text-sm leading-7 text-white/55">
                Lembaga pendidikan dan pembinaan yang berkomitmen membangun generasi berilmu, berkarakter, dan berkontribusi bagi masyarakat.
            </p>
            <div class="mt-7 flex items-center gap-3 border-t border-white/10 pt-7">
                <p class="text-xs text-white/40">© {{ date('Y') }} Wilayah Zaid bin Tsabit. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>

        {{-- Kolom 2 : Navigasi --}}
        <div class="md:col-span-1 lg:col-span-2">
            <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-goldlight/80">Navigasi</h3>
            <ul class="mt-6 space-y-3 text-sm">
                @foreach ([
                    ['label' => 'Beranda', 'route' => 'home'],
                    ['label' => 'Tentang Kami', 'route' => 'about.history'],
                    ['label' => 'Biografi', 'route' => 'biographies.index'],
                    ['label' => 'Struktur Wilayah', 'route' => 'structures.index'],
                    ['label' => 'Kegiatan', 'route' => 'activities.index'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="relative inline-block py-1 text-white/60 transition-colors duration-300 hover:text-white after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-white/80 after:transition-all after:duration-300 hover:after:w-full">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Kolom 3 : Informasi --}}
        <div class="lg:col-span-2">
            <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-goldlight/80">Informasi</h3>
            <ul class="mt-6 space-y-3 text-sm">
                @foreach ([
                    ['label' => 'Berita', 'route' => 'news.index'],
                    ['label' => 'Pendidikan', 'route' => 'education.index'],
                    ['label' => 'Kalender Kegiatan', 'route' => 'activities.calendar'],
                    ['label' => 'Download', 'route' => 'documents.index'],
                    ['label' => 'Kontak', 'route' => 'contact'],
                ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="relative inline-block py-1 text-white/60 transition-colors duration-300 hover:text-white after:absolute after:bottom-0 after:left-0 after:h-px after:w-0 after:bg-white/80 after:transition-all after:duration-300 hover:after:w-full">{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Kolom 4 : Kontak & Sosial Media --}}
        <div class="lg:col-span-3">
            <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-goldlight/80">Kontak</h3>
            <ul class="mt-6 space-y-4 text-sm text-white/60">
                <li class="flex items-start gap-3">
                    <x-icon name="map-pin" class="mt-0.5 h-4 w-4 shrink-0 text-goldlight/70" />
                    <span>{{ $address }}</span>
                </li>
                <li class="flex items-center gap-3">
                    <x-icon name="phone" class="h-4 w-4 shrink-0 text-goldlight/70" />
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}" class="transition-colors hover:text-goldlight">{{ $phone }}</a>
                </li>
                <li class="flex items-center gap-3">
                    <x-icon name="mail" class="h-4 w-4 shrink-0 text-goldlight/70" />
                    <a href="mailto:{{ $email }}" class="transition-colors hover:text-goldlight">{{ $email }}</a>
                </li>
            </ul>

            <h3 class="mt-9 text-[11px] font-bold uppercase tracking-[0.22em] text-goldlight/80">Ikuti Kami</h3>
            <div class="mt-5 flex gap-2.5">
                @forelse (array_filter($socials) as $network => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ ucfirst($network) }}"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white/70 transition-all hover:-translate-y-0.5 hover:border-goldlight hover:bg-goldlight hover:text-dark">
                        <x-icon name="{{ $network }}" class="h-4 w-4" />
                    </a>
                @empty
                    <p class="text-xs italic text-white/40">Akun media sosial resmi akan diinformasikan kemudian.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="container-app flex flex-col items-center justify-center gap-3 py-6 text-xs text-white/45 sm:flex-row sm:justify-between">
            <p>Majalah &amp; Profil Online Wilayah Zaid bin Tsabit — {{ date('Y') }}</p>
            <ul class="flex items-center gap-6">
                <li><a href="#" title="Halaman Kebijakan Privasi akan tersedia" class="transition-colors hover:text-goldlight">Kebijakan Privasi</a></li>
                <li><a href="#" title="Halaman Syarat & Ketentuan akan tersedia" class="transition-colors hover:text-goldlight">Syarat &amp; Ketentuan</a></li>
            </ul>
        </div>
    </div>
</footer>