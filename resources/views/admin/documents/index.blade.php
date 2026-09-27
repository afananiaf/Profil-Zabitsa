<x-admin-layouts.app title="Kelola Dokumen">
    <div class="flex items-center justify-between gap-4">
        <p class="text-sm text-muted">Kelola dokumen yang tersedia di pusat unduhan.</p>
        <a href="{{ route('admin.documents.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Unggah Dokumen
        </a>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[680px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Nama Dokumen</th>
                        <th class="px-5 py-3.5">Kategori</th>
                        <th class="px-5 py-3.5">Ukuran</th>
                        <th class="px-5 py-3.5">Diunggah</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($documents as $document)
                        <tr class="transition-colors hover:bg-cream/40">
                            <td class="max-w-[320px] px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-md bg-primary/5 text-[10px] font-bold text-gold">{{ $document->extension }}</span>
                                    <span class="truncate font-semibold text-primary">{{ $document->title }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $document->category }}</td>
                            <td class="px-5 py-4 text-muted">{{ $document->size_label }}</td>
                            <td class="px-5 py-4 text-muted">{{ $document->uploaded_at?->translatedFormat('d M Y') ?: '—' }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    @if ($document->file_path)
                                        <a href="{{ route('documents.download', $document->slug) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Unduh dokumen">
                                            <x-icon name="download" class="h-4 w-4" />
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.documents.edit', $document) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit dokumen">
                                        <x-icon name="pencil" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.documents.destroy', $document) }}" onsubmit="return confirm('Hapus dokumen ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus dokumen">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center text-muted">Belum ada dokumen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $documents->links() }}
</x-admin-layouts.app>