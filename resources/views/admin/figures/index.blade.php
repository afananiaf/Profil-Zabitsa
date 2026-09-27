<x-admin-layouts.app title="Kelola Tokoh">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Kelola biografi dan peran tokoh wilayah.</p>
        <a href="{{ route('admin.figures.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Tokoh Baru
        </a>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Nama</th>
                        <th class="px-5 py-3.5">Peran</th>
                        <th class="px-5 py-3.5">Kategori</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($figures as $figure)
                        <tr class="transition-colors hover:bg-cream/40">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary text-xs font-bold text-goldlight">{{ $figure->initials }}</span>
                                    <span class="font-semibold text-primary">{{ $figure->name }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $figure->role ?? '—' }}</td>
                            <td class="px-5 py-4 text-muted">{{ ucfirst($figure->category) }}</td>
                            <td class="px-5 py-4">
                                <span class="tag {{ $figure->status ? 'bg-secondary/10 text-secondary' : 'bg-muted/10 text-muted' }}">{{ $figure->status ? 'Aktif' : 'Nonaktif' }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('biographies.show', $figure->slug) }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Lihat biografi">
                                        <x-icon name="eye" class="h-4 w-4" />
                                    </a>
                                    <a href="{{ route('admin.figures.edit', $figure) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit tokoh">
                                        <x-icon name="pencil" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.figures.destroy', $figure) }}" onsubmit="return confirm('Hapus tokoh ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus tokoh">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center text-muted">Belum ada tokoh.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $figures->links() }}
</x-admin-layouts.app>