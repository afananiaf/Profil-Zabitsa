@props(['document'])

@php
    $ext = strtolower($document->extension);
$color = match ($ext) {
        'pdf' => 'bg-[#dfe7e2] text-[#0f241b]',
        'doc', 'docx' => 'bg-[#eef1ef] text-[#16382a]',
        'xls', 'xlsx' => 'bg-[#dcebe2] text-[#0f241b]',
        'ppt', 'pptx' => 'bg-[#e9eeeb] text-[#1a422f]',
        'zip' => 'bg-[#dfe7e2] text-[#0f241b]',
    };
@endphp

<div class="group flex items-start gap-4 rounded-2xl border border-line bg-surface p-5 shadow-[0_1px_3px_rgba(11,43,38,0.04)] transition-all duration-300 hover:border-primary/25 hover:shadow-[0_12px_28px_rgba(11,43,38,0.08)]">
    <span class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-xl {{ $color }}" aria-hidden="true">
        <x-icon :name="$ext === 'pdf' ? 'file-text' : 'file'" class="h-5 w-5" />
    </span>
    <div class="min-w-0 flex-1">
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <h3 class="truncate font-sans text-[15.5px] leading-snug text-primary">{{ $document->title }}</h3>
                <p class="mt-0.5 text-[11px] font-bold uppercase tracking-[0.14em] text-muted">
                    {{ $document->category }} · {{ $document->size_label }} · {{ $document->uploaded_at?->translatedFormat('d M Y') ?: '-' }}
                </p>
            </div>
            @if ($document->file_path)
                <a href="{{ route('documents.download', $document->slug) }}" aria-label="Unduh {{ $document->title }}"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-line text-secondary transition-colors duration-300 hover:border-primary hover:bg-primary hover:text-white">
                    <x-icon name="download" class="h-4.5 w-4.5" />
                </a>
            @endif
        </div>
        @if ($document->description)
            <p class="mt-2 line-clamp-2 text-[13px] leading-6 text-muted">{{ $document->description }}</p>
        @endif
    </div>
</div>