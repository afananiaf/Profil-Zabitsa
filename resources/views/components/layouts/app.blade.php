@php
    $defaultTitle = 'Wilayah Zaid bin Tsabit — Profil, Informasi, dan Dokumentasi Wilayah';
    $defaultDescription = 'Website resmi Wilayah Zaid bin Tsabit sebagai pusat informasi profil, pendidikan, kegiatan, berita, dan dokumentasi wilayah.';
    $pageTitle = $title ?? $defaultTitle;
    $pageDescription = $description ?? $defaultDescription;
    $canonical = url()->current();
    $siteLogo = \App\Models\Setting::get('site_logo');
    $favicon = $siteLogo
        ? (file_exists(public_path('favicon.png')) ? asset('favicon.png') : asset('storage/' . $siteLogo))
        : asset('favicon.svg');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>

    <meta name="description" content="{{ $pageDescription }}">
    <meta name="theme-color" content="#1a422f">
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
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Wilayah Zaid bin Tsabit">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:locale" content="id_ID">
    @isset($ogImage)
        <meta property="og:image" content="{{ $ogImage }}">
    @endisset
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ $favicon }}">
    <link rel="apple-touch-icon" href="{{ $favicon }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="flex min-h-screen flex-col @isset($bodyClass) {{ $bodyClass }} @endisset">

    @include('partials.announcement-bar')

    <x-navbar :active="$active ?? ''" />

    <main id="main" class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />

    @if (session('success'))
        <div aria-live="polite" class="fixed bottom-6 right-6 z-[70] flex max-w-sm items-start gap-3 rounded-2xl border border-primary/20 bg-white p-4 shadow-lg">
            <span class="mt-0.5 text-secondary"><x-icon name="check-circle" class="h-5 w-5" /></span>
            <p class="text-sm font-medium text-primary">{{ session('success') }}</p>
            <button type="button" onclick="this.closest('div').remove()" aria-label="Tutup pemberitahuan" class="ml-1 text-muted hover:text-primary"><x-icon name="x" class="h-4 w-4" /></button>
        </div>
    @endif

    <script>
        document.documentElement.lang = 'id';
        window.zbs = window.zbs || {};
    </script>
</body>
</html>