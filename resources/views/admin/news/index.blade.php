<x-admin-layouts.app title="Kelola Berita">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex flex-wrap gap-3">
            <div class="relative">
                <label for="q" class="sr-only">Cari berita</label>
                <x-icon name="search" class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" />
                <input id="q" type="search" name="q" value="{{ request('q') }}" placeholder="Cari judul..." class="field !w-56 !py-2.5 !pl-10 text-[13px]">
            </div>
            <div class="relative">
                <label for="status" class="sr-only">Filter status</label>
                <select id="status" name="status" class="field appearance-none !w-40 !py-2.5 pr-8 text-[13px]">
                    <option value="semua" @selected(request('status') === 'semua' || !request('status'))>Semua Status</option>
                    <option value="published" @selected(request('status') === 'published')>Terbit</option>
                    <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                </select>
                <x-icon name="chevron-down" class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted" />
            </div>
            <button type="submit" class="btn-primary !px-4 !py-2.5 text-[13px]">Cari</button>
        </form>
        <a href="{{ route('admin.news.create') }}" class="btn-primary !px-4 !py-2.5 text-[13px]">
            <x-icon name="plus" class="h-4 w-4" />
            Berita Baru
        </a>
    </div>

    <div class="mt-6 overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[720px] text-left text-sm">
                <thead>
                    <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                        <th class="px-5 py-3.5">Judul</th>
                        <th class="px-5 py-3.5">Kategori</th>
                        <th class="px-5 py-3.5">Status</th>
                        <th class="px-5 py-3.5">Tanggal Terbit</th>
                        <th class="px-5 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-line">
                    @forelse ($news as $article)
                        <tr class="transition-colors hover:bg-cream/40">
                            <td class="max-w-[360px] px-5 py-4">
                                <p class="truncate font-semibold text-primary">{{ $article->title }}</p>
                                @if ($article->is_featured)
                                    <span class="tag mt-1.5 bg-gold/10 text-gold">Unggulan</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $article->category?->name ?? '—' }}</td>
                            <td class="px-5 py-4">
                                <span class="tag {{ $article->status === 'published' ? 'bg-secondary/10 text-secondary' : 'bg-muted/10 text-muted' }}">
                                    {{ $article->status === 'published' ? 'Terbit' : 'Draft' }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-muted">{{ $article->published_at?->translatedFormat('d M Y H:i') ?: '—' }}</td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    @if ($article->status === 'published')
                                        <a href="{{ route('news.show', $article->slug) }}" target="_blank" rel="noopener" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Lihat berita">
                                            <x-icon name="eye" class="h-4 w-4" />
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.news.edit', $article) }}" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit berita">
                                        <x-icon name="pencil" class="h-4 w-4" />
                                    </a>
                                    <form method="POST" action="{{ route('admin.news.destroy', $article) }}" onsubmit="return confirm('Hapus berita ini? Tindakan tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus berita">
                                            <x-icon name="trash" class="h-4 w-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center text-muted">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $news->links() }}
</x-admin-layouts.app>