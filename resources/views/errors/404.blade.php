<x-layouts.app title="404 — Halaman Tidak Ditemukan | Wilayah Zaid bin Tsabit" description="Halaman yang Anda cari tidak ditemukan.">

    <div class="container-app flex flex-col items-center justify-center py-24 text-center sm:py-32">
        <div class="reveal flex items-center gap-6">
            <p class="font-serif text-7xl font-bold text-primary sm:text-8xl">4</p>
            <span class="relative flex h-20 w-20 items-center justify-center rounded-2xl bg-primary text-goldlight sm:h-24 sm:w-24" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" fill="none" class="h-14 w-14 sm:h-16 sm:w-16">
                    <g stroke="#E4D29A" stroke-width="1.4">
                        <circle cx="22" cy="22" r="19" opacity="0.55" />
                        <circle cx="22" cy="22" r="14" opacity="0.4" />
                        <path d="M22 8l4.8 9.2L36 22l-9.2 4.8L22 36l-4.8-9.2L8 22l9.2-4.8z" opacity="0.95" />
                    </g>
                    <path d="M22 15.5l2.6 5 5 2.6-5 2.6-2.6 5-2.6-5-5-2.6 5-2.6z" fill="#E4D29A" opacity="0.85" />
                </svg>
            </span>
            <p class="font-serif text-7xl font-bold text-primary sm:text-8xl">4</p>
        </div>
        <h1 class="mt-8 font-serif text-2xl text-primary sm:text-3xl">Halaman yang Anda cari tidak ditemukan.</h1>
        <p class="mt-3 max-w-md text-[14.5px] leading-7 text-muted">
            Halaman mungkin telah dipindahkan, dihapus, atau tautan yang Anda gunakan tidak tersedia. Silakan kembali ke beranda untuk melanjutkan penjelajahan.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="btn-primary">
                <x-icon name="home" class="h-4 w-4" />
                Kembali ke Beranda
            </a>
            <a href="{{ route('contact') }}" class="btn-outline">Hubungi Kami</a>
        </div>
    </div>

</x-layouts.app>