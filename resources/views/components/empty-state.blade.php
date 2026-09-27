@props([
    'icon' => 'file-text',
    'title' => 'Belum ada data',
    'description' => 'Data akan segera tersedia.',
    'actionLabel' => null,
    'actionUrl' => null,
])

<div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-line bg-white/70 px-6 py-16 text-center">
    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-primary/8 text-secondary">
        <x-icon :name="$icon" class="h-7 w-7" />
    </span>
    <h3 class="mt-5 font-serif text-2xl text-primary">{{ $title }}</h3>
    <p class="mt-2 max-w-sm text-sm leading-6 text-muted">{{ $description }}</p>
    @if ($actionLabel && $actionUrl)
        <a href="{{ $actionUrl }}" class="btn-outline mt-6 !px-4 !py-2.5 text-[13px]">{{ $actionLabel }}</a>
    @endif
</div>