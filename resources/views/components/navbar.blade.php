@props(['active' => ''])

@php
    $siteLogo = \App\Models\Setting::get('site_logo');
    $items = [
        ['label' => 'Beranda', 'route' => 'home', 'key' => 'home'],
        [
            'label' => 'Tentang Kami',
            'key' => 'about',
            'children' => [
                ['label' => 'Sejarah Wilayah', 'route' => 'about.history'],
                ['label' => 'Visi & Misi', 'route' => 'about.vision'],
                ['label' => 'Biografi', 'route' => 'biographies.index'],
                ['label' => 'Struktur Wilayah', 'route' => 'structures.index'],
            ],
        ],
        ['label' => 'Pendidikan', 'route' => 'education.index', 'key' => 'education'],
        [
            'label' => 'Berita',
            'key' => 'news',
            'children' => [
                ['label' => 'Berita Terbaru', 'route' => 'news.index'],
                ['label' => 'Arsip Berita', 'route' => 'news.archive'],
            ],
        ],
        [
            'label' => 'Kegiatan',
            'key' => 'activities',
            'children' => [
                ['label' => 'Daftar Kegiatan', 'route' => 'activities.index'],
                ['label' => 'Kalender Kegiatan', 'route' => 'activities.calendar'],
            ],
        ],
        ['label' => 'Download', 'route' => 'documents.index', 'key' => 'documents'],
    ];
@endphp

<div class="site-header-wrap">
    <header id="site-header" class="site-header">
        <nav class="flex h-full w-full items-center justify-between gap-4 px-6 sm:px-10 lg:px-14" aria-label="Navigasi utama">

            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3" aria-label="Wilayah Zaid bin Tsabit — Beranda">
<span class="site-logo-box flex items-center justify-center overflow-hidden rounded-full bg-primary text-goldlight" aria-hidden="true">
    @if (!empty($siteLogo))
        <img src="{{ asset('storage/' . $siteLogo) }}" alt="Logo Wilayah Zaid bin Tsabit" class="h-full w-full rounded-full object-cover">
    @else
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-7 w-7">
            <g stroke="#ffffff" stroke-width="1.4">
                <circle cx="22" cy="22" r="19" opacity="0.55" />
                <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.95" />
            </g>
        </svg>
    @endif
</span>
                <span class="leading-none">
                    <span class="site-logo-name block font-serif text-[15.5px] font-semibold tracking-wide text-primary">WILAYAH <span class="text-gold">ZAID BIN TSABIT</span></span>
                    <span class="mt-1 hidden text-[9px] font-medium uppercase tracking-[0.22em] text-muted sm:block">Profil, Informasi &amp; Dokumentasi Wilayah</span>
                </span>
            </a>

            <ul class="ml-auto hidden flex-nowrap items-center justify-center gap-0 xl:flex">
                @foreach ($items as $item)
                    @if (isset($item['children']))
                        <li class="relative" data-dropdown>
                            <button type="button" data-dropdown-button aria-haspopup="true" aria-expanded="false"
                                class="nav-item inline-flex items-center gap-1 {{ $active === $item['key'] ? 'is-active text-primary' : 'text-ink/75 hover:text-primary' }}">
                                {{ $item['label'] }}
                                <x-icon name="chevron-down" class="h-3.5 w-3.5 opacity-60" />
                            </button>
                            <div data-dropdown-menu
                                class="invisible absolute left-0 top-full w-60 origin-top rounded-2xl border border-line bg-surface/95 p-2 opacity-0 shadow-[0_24px_60px_rgba(17,17,17,0.12)] backdrop-blur transition-all duration-200 translate-y-2">
                                @foreach ($item['children'] as $child)
                                    <a href="{{ route($child['route']) }}"
                                        class="group relative flex items-center justify-between px-3.5 py-2.5 text-[13px] font-medium text-ink/80 transition-colors duration-300 hover:text-primary after:absolute after:bottom-2 after:left-3.5 after:h-px after:w-0 after:bg-primary after:transition-all after:duration-300 hover:after:w-[calc(100%-28px)]">
                                        {{ $child['label'] }}
                                        <x-icon name="arrow-right" class="h-3.5 w-3.5 opacity-0 transition-all duration-200 group-hover:opacity-100 group-hover:translate-x-0.5" />
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="nav-item {{ $active === $item['key'] ? 'is-active text-primary' : 'text-ink/75 hover:text-primary' }}">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            <div class="flex shrink-0 items-center gap-2">
                <div class="theme-switcher hidden lg:inline-flex" role="group" aria-label="Mode tampilan" data-theme-switcher>
                    <button type="button" data-theme-option="light" aria-pressed="false" aria-label="Mode terang" title="Mode terang">
                        <x-icon name="sun" class="h-4 w-4" />
                    </button>
                    <button type="button" data-theme-option="dark" aria-pressed="false" aria-label="Mode gelap" title="Mode gelap">
                        <x-icon name="moon" class="h-4 w-4" />
                    </button>
                </div>
                <a href="{{ route('contact') }}" class="btn-primary navbar-cta hidden lg:inline-flex">
                    Hubungi Kami
                </a>
                <button id="mobile-menu-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-menu"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-line bg-surface text-primary transition-colors hover:border-primary xl:hidden">
                    <svg data-icon="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-5 w-5"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    <svg data-icon="close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="hidden h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </nav>
    </header>
</div>

<div id="mobile-menu-overlay" class="fixed inset-0 z-[60] bg-dark/40 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 xl:hidden" aria-hidden="true"></div>

<div id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menu navigasi"
    class="fixed inset-y-0 right-0 z-[65] flex w-[330px] max-w-[88vw] translate-x-full flex-col bg-surface shadow-2xl transition-transform duration-300 ease-out xl:hidden">
    <div class="flex h-[86px] items-center justify-between border-b border-line px-7">
        <div>
            <p class="font-serif text-[15px] font-semibold tracking-wide text-primary">WILAYAH <span class="text-gold">ZAID BIN TSABIT</span></p>
            <p class="mt-1 text-[9px] font-medium uppercase tracking-[0.22em] text-muted">Profil, Informasi &amp; Dokumentasi Wilayah</p>
        </div>
        <button type="button" aria-label="Tutup menu" onclick="document.getElementById('mobile-menu-toggle').click()" class="flex h-9 w-9 items-center justify-center rounded-full border border-line text-muted hover:text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-4 w-4"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
    </div>
    <nav class="flex-1 overflow-y-auto px-4 py-5" aria-label="Navigasi menu mobile">
        <ul class="space-y-1">
            @foreach ($items as $item)
                @if (isset($item['children']))
                    <li>
                        <button type="button" data-submenu-toggle="{{ $loop->index }}" aria-expanded="false" aria-controls="submenu-{{ $loop->index }}"
                            class="flex w-full items-center justify-between px-3.5 py-3 text-[14px] font-semibold transition-colors duration-300 {{ $active === $item['key'] ? 'text-primary' : 'text-ink/85 hover:text-primary' }}">
                            {{ $item['label'] }}
                            <x-icon name="chevron-down" data-submenu-chevron class="h-4 w-4 opacity-60 transition-transform duration-300" />
                        </button>
                        <ul id="submenu-{{ $loop->index }}" class="hidden space-y-1 border-l border-gold/40 pl-4" style="margin-left: 1rem">
                            @foreach ($item['children'] as $child)
                                <li>
                                    <a href="{{ route($child['route']) }}" class="relative flex items-center justify-between px-3 py-2.5 text-[13.5px] font-medium text-muted transition-colors duration-300 hover:text-primary after:absolute after:left-3 after:bottom-2 after:h-px after:w-0 after:bg-primary after:transition-all after:duration-300 hover:after:w-[calc(100%-24px)]">
                                        {{ $child['label'] }}
                                        <x-icon name="arrow-right" class="h-3.5 w-3.5 opacity-40" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route($item['route']) }}" class="relative flex items-center justify-between px-3.5 py-3 text-[14px] font-semibold transition-colors duration-300 {{ $active === $item['key'] ? 'text-primary' : 'text-ink/85 hover:text-primary' }} after:absolute after:left-3.5 after:bottom-3 after:h-px after:w-0 after:bg-primary after:transition-all after:duration-300 hover:after:w-[calc(100%-28px)]">
                            {{ $item['label'] }}
                            @if ($item['key'] === 'home')
                                <x-icon name="home" class="h-4 w-4 opacity-40" />
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
    <div class="border-t border-line p-5">
        <div class="theme-switcher mb-4 flex items-center gap-1" role="group" aria-label="Mode tampilan" data-theme-switcher>
            <button type="button" data-theme-option="light" aria-pressed="false" aria-label="Mode terang" title="Mode terang" class="theme-icon-btn">
                <x-icon name="sun" class="h-4 w-4" />
            </button>
            <button type="button" data-theme-option="dark" aria-pressed="false" aria-label="Mode gelap" title="Mode gelap" class="theme-icon-btn">
                <x-icon name="moon" class="h-4 w-4" />
            </button>
        </div>
        <a href="{{ route('contact') }}" class="btn-primary w-full">
            Hubungi Kami
        </a>
        <p class="mt-4 text-center text-[10px] uppercase tracking-[0.22em] text-muted">Wilayah Zaid bin Tsabit</p>
    </div>
</div>