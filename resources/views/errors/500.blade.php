<x-layouts.app title="{{ isset($exception) && $exception->getStatusCode() === 503 ? 'Situs Sedang Dalam Perawatan' : 'Terjadi Kesalahan — Wilayah Zaid bin Tsabit' }}" description="Terjadi kesalahan pada layanan website.">

    <div class="container-app flex flex-col items-center justify-center py-24 text-center sm:py-32">
        <p class="font-serif text-7xl font-bold text-primary sm:text-8xl">{{ isset($exception) ? $exception->getStatusCode() : 500 }}</p>
        <h1 class="mt-8 font-serif text-2xl text-primary sm:text-3xl">Terjadi kendala pada layanan kami.</h1>
        <p class="mt-3 max-w-md text-[14.5px] leading-7 text-muted">
            Kami sedang berusaha memperbaiki kendala tersebut. Silakan coba beberapa saat lagi.
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