<x-admin-layouts.app title="Kelola Kegiatan">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Kelola agenda dan dokumentasi kegiatan wilayah.</p>
        <a href="{{ route('admin.activities.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Kegiatan Baru
        </a>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Judul</th>
                        <th class="px-5 py-3.5">Waktu</th>
                        <th class="px-5 py-3.5">Lokasi</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($activities as $activity)
                        <tr class="transition-colors hover:bg-cream/40">
                            <td class="max-w-[320px] px-5 py-4">
                                <p class="truncate font-semibold text-primary">{{ $activity->title }}</p>
                                @if ($activity->is_featured)
                                    <span class="tag mt-1.5 bg-gold/10 text-gold">Unggulan</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $activity->date_range }}</td>
                            <td class="px-5 py-4 text-muted">{{ $activity->location ?? '—' }}</td>
                            <td class="px-5 py-4">
                                <span class="tag {{ $activity->status === 'completed' ? 'bg-muted/10 text-muted' : ($activity->status === 'ongoing' ? 'bg-gold/10 text-gold' : 'bg-secondary/10 text-secondary') }}">{{ $activity->status_label }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('activities.show', $activity->slug) }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Lihat kegiatan">
                                        <x-icon name="eye" class="h-4 w-4" />
                                    </a>
                                    <a href="{{ route('admin.activities.edit', $activity) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit kegiatan">
                                        <x-icon name="pencil" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.activities.destroy', $activity) }}" onsubmit="return confirm('Hapus kegiatan ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus kegiatan">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center text-muted">Belum ada kegiatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $activities->links() }}
</x-admin-layouts.app>