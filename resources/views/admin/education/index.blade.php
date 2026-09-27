<x-admin-layouts.app title="Kelola Jenjang Pendidikan">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Kelola jenjang dan program pendidikan.</p>
        <a href="{{ route('admin.education.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Jenjang Baru
        </a>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Nama Jenjang</th>
                        <th class="px-5 py-3.5">Singkatan</th>
                        <th class="px-5 py-3.5">Deskripsi</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($levels as $level)
                        <tr class="transition-colors hover:bg-cream/40">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 items-center justify-center rounded-md bg-primary/5 text-gold">
                                        <x-icon :name="$level->icon ?: 'graduation-cap'" class="h-4 w-4" />
                                    </span>
                                    <span class="font-semibold text-primary">{{ $level->name }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $level->short_name ?? '—' }}</td>
                            <td class="max-w-[300px] px-5 py-4"><p class="truncate text-muted">{{ $level->description }}</p></td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('education.show', $level->slug) }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Lihat jenjang">
                                        <x-icon name="eye" class="h-4 w-4" />
                                    </a>
                                    <a href="{{ route('admin.education.edit', $level) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit jenjang">
                                        <x-icon name="pencil" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.education.destroy', $level) }}" onsubmit="return confirm('Hapus jenjang ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus jenjang">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-14 text-center text-muted">Belum ada jenjang pendidikan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $levels->links() }}
</x-admin-layouts.app>