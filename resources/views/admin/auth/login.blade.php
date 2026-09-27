<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Masuk — Admin Wilayah Zaid bin Tsabit</title>
    @php $adminLoginLogo = \App\Models\Setting::get('site_logo'); @endphp
    <link rel="icon" href="{{ $adminLoginLogo ? (file_exists(public_path('favicon.png')) ? asset('favicon.png') : asset('storage/' . $adminLoginLogo)) : asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center justify-center bg-cream px-4 font-sans text-ink">

    <div class="relative w-full max-w-md">
        <div class="rounded-lg border border-line bg-white p-8 shadow-[0_20px_60px_rgba(11,36,27,0.12)] sm:p-10">
            <div class="flex flex-col items-center text-center">
                <span class="flex h-14 w-14 items-center justify-center rounded-md bg-primary text-goldlight" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-10 w-10">
                        <g stroke="#E4D29A" stroke-width="1.4">
                            <circle cx="22" cy="22" r="19" opacity="0.55" />
                            <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.95" />
                        </g>
                        <path d="M22 15.5l2.6 5 5 2.6-5 2.6-2.6 5-2.6-5-5-2.6 5-2.6z" fill="#E4D29A" opacity="0.85" />
                    </svg>
                </span>
                <h1 class="mt-5 font-sans text-2xl text-primary">Panel Admin</h1>
                <p class="mt-1.5 text-[13px] text-muted">Masuk untuk mengelola konten Wilayah Zaid bin Tsabit</p>
            </div>

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="email" class="label">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="admin@wilayahzaidbintsabit.id" class="field" required autofocus>
                    @error('email') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="password" class="label">Kata Sandi</label>
                    <input id="password" type="password" name="password" placeholder="••••••••" class="field" required>
                    @error('password') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <label class="flex items-center gap-2.5 text-sm text-muted">
                    <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-line accent-primary">
                    Ingat saya
                </label>
                <button type="submit" class="btn-primary w-full">
                    <x-icon name="logout" class="h-4 w-4 rotate-180" />
                    Masuk
                </button>
            </form>

            <div class="mt-6 border-t border-line pt-5 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-secondary transition-colors hover:text-gold">
                    <x-icon name="chevron-left" class="h-3.5 w-3.5" />
                    Kembali ke Website
                </a>
            </div>
        </div>
        <p class="mt-6 text-center text-xs text-muted">© {{ date('Y') }} Wilayah Zaid bin Tsabit</p>
    </div>

</body>
</html>