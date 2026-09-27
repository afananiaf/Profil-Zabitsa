@props(['document'])

@php
    $ext = strtolower($document->extension);
    $badge = $ext === 'pdf' ? 'PDF' : strtoupper($ext);
    $icon = match ($ext) {
        'pdf' => 'file-text',
        'doc', 'docx' => 'file',
        'xls', 'xlsx' => 'file-text',
        'ppt', 'pptx' => 'file-text',
        default => 'file',
    };
    $color = match ($ext) {
        'pdf' => 'bg-[#dfe7e2] text-[#0f241b]',
        'doc', 'docx' => 'bg-[#eef1ef] text-[#16382a]',
        'xls', 'xlsx' => 'bg-[#dcebe2] text-[#0f241b]',
        'ppt', 'pptx' => 'bg-[#e9eeeb] text-[#1a422f]',
        default => 'bg-cream text-primary',
    };
@endphp

<div class="group flex items-center gap-5">
    <span class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-2xl {{ $color }}" aria-hidden="true">
        <x-icon :name="$icon" class="h-4.5 w-4.5" />
        <span class="mt-0.5 text-[8.5px] font-extrabold leading-none tracking-wide">{{ $badge }}</span>
    </span>
    <div class="min-w-0 flex-1">
        <a href="{{ $document->file_path ? route('documents.download', $document->slug) : '#' }}" class="line-clamp-1 font-serif text-[17px] font-semibold text-primary transition-colors group-hover:text-secondary">
            {{ $document->title }}
        </a>
        <p class="mt-1 text-[12px] text-muted">
            {{ $document->category }} · {{ $document->size_label }}
            @if ($document->uploaded_at)
                · {{ $document->uploaded_at->translatedFormat('d M Y') }}
            @endif
        </p>
    </div>
    @if ($document->file_path)
        <a href="{{ route('documents.download', $document->slug) }}" aria-label="Unduh {{ $document->title }}"
            class="inline-flex shrink-0 items-center gap-2 rounded-full border border-line bg-surface px-4 py-2.5 text-[12.5px] font-bold text-primary transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">
            Unduh
            <x-icon name="download" class="h-3.5 w-3.5" />
        </a>
    @else
        <span class="text-[11px] font-medium italic text-muted/70">Segera</span>
    @endif
</div>