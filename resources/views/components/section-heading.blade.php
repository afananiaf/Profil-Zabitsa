@props([
    'eyebrow' => '',
    'title' => '',
    'description' => '',
    'align' => 'left',
    'light' => false,
])

<div class="reveal {{ $align === 'center' ? 'mx-auto max-w-3xl text-center' : 'max-w-3xl' }} {{ $light ? 'text-white' : '' }}">
    <h2 class="section-title {{ $light ? '!text-white' : '' }} text-balance">{{ $title }}</h2>
    @if ($description)
        <p class="mt-5 text-[15.5px] leading-8 {{ $light ? 'text-white/70' : 'text-muted' }}">{{ $description }}</p>
    @endif
</div>