@php
    $pageTitle = $title ?? 'Dashboard';
    $adminLayoutLogo = \App\Models\Setting::get('site_logo');
    $adminLayoutFavicon = $adminLayoutLogo
        ? (file_exists(public_path('favicon.png')) ? asset('favicon.png') : asset('storage/' . $adminLayoutLogo))
        : asset('favicon.svg');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $pageTitle }} — Admin Wilayah Zaid bin Tsabit</title>
    <meta name="theme-color" content="#0C6E53">
    <link rel="icon" href="{{ $adminLayoutFavicon }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        (function () {
            try {
                var stored = localStorage.getItem('zbs-theme');
                var dark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var mode = stored === 'light' || stored === 'dark' ? stored : (dark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', mode);
            } catch (e) { /* private mode */ }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream font-sans text-ink dark:bg-dark dark:text-white">

    <div class="flex min-h-screen">
        <button type="button" id="admin-sidebar-toggle" aria-label="Buka menu admin" aria-expanded="false" aria-controls="admin-sidebar"
            class="fixed left-4 top-4 z-[55] flex h-10 w-10 items-center justify-center rounded-md border border-line bg-white text-primary shadow-sm dark:border-white/10 dark:bg-dark dark:text-goldlight lg:hidden">
            <svg data-icon="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="h-5 w-5"><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
            <svg data-icon="close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="hidden h-5 w-5"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>

        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 flex w-[260px] -translate-x-full flex-col bg-dark text-white transition-transform duration-300 lg:translate-x-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 border-b border-white/10 px-5 py-5" aria-label="Admin Wilayah Zaid bin Tsabit">
                @php $adminLogo = \App\Models\Setting::get('site_logo'); @endphp
                <span class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-primary text-goldlight" aria-hidden="true">
                    @if (!empty($adminLogo))
                        <img src="{{ asset('storage/' . $adminLogo) }}" alt="Logo Wilayah Zaid bin Tsabit" class="h-full w-full rounded-full object-cover">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-7 w-7">
                            <g stroke="#E4D29A" stroke-width="1.4">
                                <circle cx="22" cy="22" r="19" opacity="0.55" />
                                <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.95" />
                            </g>
                        </svg>
                    @endif
                </span>
                <span class="leading-none">
                    <span class="block font-sans text-[14px] font-bold tracking-[0.08em]">WILAYAH</span>
                    <span class="mt-1 block text-[9.5px] font-semibold uppercase tracking-[0.22em] text-white/50">Zaid bin Tsabit</span>
                    <span class="mt-1.5 block text-[10px] font-bold uppercase tracking-[0.2em] text-goldlight">Panel Admin</span>
                </span>
            </a>

            <nav class="flex-1 overflow-y-auto px-3 py-4" aria-label="Navigasi admin">
                <p class="px-3 pb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-white/40">Menu Utama</p>
                <ul class="space-y-0.5">
                    @php
                        $menu = [
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'grid', 'active' => request()->routeIs('admin.dashboard')],
                            ['label' => 'Berita', 'route' => 'admin.news.index', 'icon' => 'newspaper', 'active' => request()->routeIs('admin.news.*')],
                            ['label' => 'Kegiatan', 'route' => 'admin.activities.index', 'icon' => 'calendar', 'active' => request()->routeIs('admin.activities.*')],
                            ['label' => 'Tokoh', 'route' => 'admin.figures.index', 'icon' => 'users', 'active' => request()->routeIs('admin.figures.*')],
                            ['label' => 'Pendidikan', 'route' => 'admin.education.index', 'icon' => 'graduation-cap', 'active' => request()->routeIs('admin.education.*')],
                            ['label' => 'Struktur Organisasi', 'route' => 'admin.structures.index', 'icon' => 'building-2', 'active' => request()->routeIs('admin.structures.*')],
                            ['label' => 'Dokumen', 'route' => 'admin.documents.index', 'icon' => 'file-text', 'active' => request()->routeIs('admin.documents.*')],
                            ['label' => 'Kategori', 'route' => 'admin.categories.index', 'icon' => 'list', 'active' => request()->routeIs('admin.categories.*')],
                            ['label' => 'Pesan Masuk', 'route' => 'admin.messages.index', 'icon' => 'inbox', 'active' => request()->routeIs('admin.messages.*')],
                            ['label' => 'Pengaturan', 'route' => 'admin.settings', 'icon' => 'sliders', 'active' => request()->routeIs('admin.settings')],
                        ];
                    @endphp
                    @foreach ($menu as $item)
                        <li>
                            <a href="{{ route($item['route']) }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-[13.5px] font-semibold transition-colors {{ $item['active'] ? 'bg-primary text-goldlight' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                                <x-icon :name="$item['icon']" class="h-4.5 w-4.5 shrink-0" />
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <p class="px-3 pb-2 pt-6 text-[10px] font-bold uppercase tracking-[0.2em] text-white/40">Website</p>
                <ul class="space-y-0.5">
                    <li>
                        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-[13.5px] font-semibold text-white/70 transition-colors hover:bg-white/5 hover:text-white">
                            <x-icon name="external-link" class="h-4.5 w-4.5 shrink-0" />
                            Lihat Website
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="border-t border-white/10 p-4">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-md px-3 py-2.5 text-[13.5px] font-semibold text-white/70 transition-colors hover:bg-white/5 hover:text-white">
                        <x-icon name="logout" class="h-4.5 w-4.5 shrink-0" />
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <div id="admin-sidebar-overlay" class="fixed inset-0 z-40 bg-dark/50 opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden" aria-hidden="true"></div>

        <div class="flex min-w-0 flex-1 flex-col lg:pl-[260px]">
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between gap-4 border-b border-line bg-white/95 px-4 backdrop-blur dark:border-white/10 dark:bg-dark/95 sm:px-8">
                <div class="flex items-center gap-3">
                    <span class="hidden text-2xl lg:block" aria-hidden="true">—</span>
                    <h1 class="font-sans text-lg text-primary sm:text-xl">{{ $pageTitle }}</h1>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.news.create') }}" class="btn-primary hidden !px-4 !py-2 text-[13px] sm:inline-flex">
                        <x-icon name="plus" class="h-4 w-4" />
                        Berita Baru
                    </a>
                    <div class="theme-switcher !hidden sm:!inline-flex" role="group" aria-label="Mode tampilan" data-theme-switcher>
                        <button type="button" data-theme-option="light" aria-pressed="false" aria-label="Mode terang" title="Mode terang" class="theme-icon-btn">
                            <x-icon name="sun" class="h-4 w-4" />
                        </button>
                        <button type="button" data-theme-option="dark" aria-pressed="false" aria-label="Mode gelap" title="Mode gelap" class="theme-icon-btn">
                            <x-icon name="moon" class="h-4 w-4" />
                        </button>
                    </div>
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-sm font-bold text-goldlight" aria-hidden="true">
                        {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                    </span>
                    <span class="hidden text-[13px] font-semibold text-ink/80 dark:text-white/80 sm:block">{{ auth()->user()->name }}</span>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 sm:px-8 sm:py-8">
                @if (session('success'))
                    <div class="mb-6 flex items-start gap-3 rounded-md border border-secondary/20 bg-secondary/5 p-4 dark:border-secondary/30 dark:bg-secondary/10" role="status">
                        <x-icon name="check-circle" class="mt-0.5 h-5 w-5 shrink-0 text-secondary" />
                        <p class="text-sm font-medium text-secondary">{{ session('success') }}</p>
                        <button type="button" onclick="this.closest('div').remove()" aria-label="Tutup pemberitahuan" class="ml-auto text-muted hover:text-primary"><x-icon name="x" class="h-4 w-4" /></button>
                    </div>
                @endif
                @if ($errors->any() && !request()->routeIs('admin.login'))
                    <div class="mb-6 flex items-start gap-3 rounded-md border border-red-200 bg-red-50 p-4 dark:border-red-500/30 dark:bg-red-500/10">
                        <x-icon name="alert-circle" class="mt-0.5 h-5 w-5 shrink-0 text-red-500 dark:text-red-400" />
                        <ul class="space-y-1 text-sm font-medium text-red-600 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('admin-sidebar-toggle');
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('admin-sidebar-overlay');
            if (!toggle || !sidebar) return;
            const setOpen = (open) => {
                sidebar.classList.toggle('-translate-x-full', !open);
                overlay.classList.toggle('opacity-0', !open);
                overlay.classList.toggle('pointer-events-none', !open);
                toggle.setAttribute('aria-expanded', String(open));
                toggle.querySelectorAll('svg').forEach((svg) => svg.classList.toggle('hidden', (svg.dataset.icon === 'open') === open));
            };
            toggle.addEventListener('click', () => setOpen(sidebar.classList.contains('-translate-x-full')));
            overlay.addEventListener('click', () => setOpen(false));
            document.addEventListener('keydown', (e) => { if (e.key === 'Escape') setOpen(false); });
        });
    </script>
</body>
</html>