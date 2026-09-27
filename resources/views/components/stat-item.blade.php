@props([
    'value' => '—',
    'label' => '',
    'note' => '',
])

<div class="border-t border-primary/15 pt-6">
    <p class="font-serif text-[42px] leading-none tracking-tight text-primary sm:text-5xl" data-count="{{ is_numeric($value) ? preg_replace('/[^0-9.]/', '', $value) : '' }}">{{ $value }}</p>
    <p class="mt-3 text-[11px] font-bold uppercase tracking-[0.2em] text-secondary">{{ $label }}</p>
    @if ($note)
        <p class="mt-1.5 text-[11px] italic leading-4 text-muted/70">{{ $note }}</p>
    @endif
</div>