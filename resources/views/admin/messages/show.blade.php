<x-admin-layouts.app title="Detail Pesan">
    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-1.5 text-[13px] font-bold text-secondary hover:text-gold">
        <x-icon name="chevron-left" class="h-3.5 w-3.5" />
        Kembali ke Daftar Pesan
    </a>

    <div class="mt-6 max-w-2xl rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="border-b border-line p-6">
            <h2 class="font-sans text-xl text-primary">{{ $pesan->subject }}</h2>
            <div class="mt-3 flex flex-wrap items-center gap-4 text-sm text-muted">
                <span class="flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-primary text-xs font-bold text-goldlight">{{ strtoupper(mb_substr($pesan->name, 0, 1)) }}</span>
                    <span class="font-semibold text-primary">{{ $pesan->name }}</span>
                </span>
                <a href="mailto:{{ $pesan->email }}" class="inline-flex items-center gap-1.5 text-secondary hover:text-gold">
                    <x-icon name="mail" class="h-4 w-4" />
                    {{ $pesan->email }}
                </a>
                <time class="inline-flex items-center gap-1.5">
                    <x-icon name="clock" class="h-4 w-4 text-gold" />
                    {{ $pesan->created_at->translatedFormat('l, d F Y · H:i') }}
                </time>
            </div>
        </div>
        <div class="whitespace-pre-wrap p-6 text-[14.5px] leading-8 text-ink/85">{{ $pesan->message }}</div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-line p-5">
            <a href="mailto:{{ $pesan->email }}?subject=Balasan: {{ $pesan->subject }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
                <x-icon name="send" class="h-4 w-4" />
                Balas via Email
            </a>
            <form method="POST" action="{{ route('admin.messages.destroy', $pesan) }}" onsubmit="return confirm('Hapus pesan ini? Tindakan tidak dapat dibatalkan.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-outline !px-4 !py-2.5 !text-red-500">
                    <x-icon name="trash" class="h-4 w-4" />
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</x-admin-layouts.app>