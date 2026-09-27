@props(['node', 'level' => 0, 'levelNames' => []])

@php
    $gen = min((int) $node->generation, 2);
@endphp

<div class="overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
    <div class="flex items-center justify-between gap-4 border-b border-line {{ $level === 0 ? 'border-gold/30 bg-cream/50' : 'bg-cream/30' }} px-5 py-3.5 {{ $level > 0 ? '!border-l-4 !border-l-gold/60' : '' }}">
        <div class="flex items-center gap-3">
            <span class="tag {{ $gen === 0 ? 'bg-primary/10 text-primary' : ($gen === 1 ? 'bg-secondary/10 text-secondary' : 'bg-gold/15 text-gold') }}">
                Tingkat {{ $gen + 1 }} · {{ $levelNames[$gen] ?? 'Lainnya' }}
            </span>
            <p class="font-sans text-[15px] font-bold text-primary">{{ $node->name }}</p>
            @if ($node->position)
                <span class="tag bg-primary/5 text-muted">{{ $node->position }}</span>
            @endif
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.structures.edit', $node) }}" class="flex h-8 w-8 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit">
                <x-icon name="pencil" class="h-3.5 w-3.5" />
            </a>
            <form method="POST" action="{{ route('admin.structures.destroy', $node) }}" onsubmit="return confirm('Hapus bagian ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex h-8 w-8 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus">
                    <x-icon name="trash" class="h-3.5 w-3.5" />
                </button>
            </form>
        </div>
    </div>

    @if ($node->children->isNotEmpty())
        <ul class="divide-y divide-line">
            @foreach ($node->children as $child)
                <li>
                    <div class="my-1.5 ml-5 border-l border-line px-1">
                        @include('admin.structures._node', ['node' => $child, 'level' => $level + 1, 'levelNames' => $levelNames])
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>