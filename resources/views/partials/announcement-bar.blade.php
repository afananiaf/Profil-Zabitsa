@props([
    'active' => '',
])

@php
    $announcement = \App\Models\Setting::get('announcement_text');
@endphp

@if (!empty($announcement))
    <div id="announcement-bar" class="relative z-50 border-b border-primary/20 bg-primary text-white">
        <div class="container-app flex items-center justify-center gap-3 py-2.5 pr-12 text-center">
            <span class="hidden h-1 w-1 rounded-full bg-goldlight sm:block" aria-hidden="true"></span>
            <p class="text-xs font-medium tracking-wide sm:text-[12.5px]">{{ $announcement }}</p>
        </div>
        <button id="announcement-close" type="button" aria-label="Tutup pengumuman"
            class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full p-1.5 text-white/70 transition-colors hover:bg-white/10 hover:text-white">
            <x-icon name="x" class="h-3.5 w-3.5" />
        </button>
    </div>
@else
    <div id="announcement-bar" class="hidden"></div>
@endif