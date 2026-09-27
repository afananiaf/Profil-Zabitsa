<x-admin-layouts.app title="Pesan Masuk">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Pesan yang dikirim melalui laman kontak website.</p>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[680px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Pengirim</th>
                        <th class="px-5 py-3.5">Subjek</th>
                        <th class="px-5 py-3.5">Pesan</th>
                        <th class="px-5 py-3.5">Waktu</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($messages as $message)
                        <tr class="transition-colors hover:bg-cream/40 {{ $message->is_read ? 'opacity-70' : '' }}">
                            <td class="px-5 py-4">
                                <p class="font-semibold text-primary">{{ $message->name }}</p>
                                <p class="text-xs text-muted">{{ $message->email }}</p>
                            </td>
                            <td class="max-w-[200px] px-5 py-4"><p class="truncate font-medium text-ink/80">{{ $message->subject }}</p></td>
                            <td class="max-w-[240px] px-5 py-4"><p class="truncate text-muted">{{ $message->message }}</p></td>
                            <td class="px-5 py-4 text-muted">{{ $message->created_at->translatedFormat('d M Y H:i') }}</td>
                            <td class="px-5 py-4">
                                <span class="tag {{ $message->is_read ? 'bg-muted/10 text-muted' : 'bg-gold/15 text-gold' }}">{{ $message->is_read ? 'Dibaca' : 'Baru' }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Lihat pesan">
                                        <x-icon name="eye" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Hapus pesan ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus pesan">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-14 text-center text-muted">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $messages->links() }}
</x-admin-layouts.app>