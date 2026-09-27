<x-admin-layouts.app title="Kelola Kategori Berita">
    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="overflow-hidden rounded-lg border border-line bg-white shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[520px] text-left text-sm">
                    <thead>
                        <tr class="border-b border-line bg-cream/60 text-[11px] font-bold uppercase tracking-wider text-muted">
                            <th class="px-5 py-3.5">Nama</th>
                            <th class="px-5 py-3.5">Slug</th>
                            <th class="px-5 py-3.5">Jumlah Berita</th>
                            <th class="px-5 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line">
                        @forelse ($categories as $category)
                            <tr class="transition-colors hover:bg-cream/40">
                                <td class="px-5 py-4 font-semibold text-primary">{{ $category->name }}</td>
                                <td class="px-5 py-4 text-muted">{{ $category->slug }}</td>
                                <td class="px-5 py-4 text-muted">{{ $category->news_articles_count }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <button type="button" data-edit-category="{{ $category->id }}"
                                            data-name="{{ $category->name }}" data-description="{{ $category->description }}"
                                            class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-primary hover:text-primary" aria-label="Edit kategori">
                                            <x-icon name="pencil" class="h-4 w-4" />
                                        </button>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Hapus kategori ini? Berita dalam kategori ini tidak ikut terhapus.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-md border border-line text-muted transition-colors hover:border-red-500 hover:text-red-500" aria-label="Hapus kategori">
                                                <x-icon name="trash" class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-14 text-center text-muted">Belum ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-6">
            <div id="create-form" class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <h2 class="font-sans text-lg text-primary">Tambah Kategori</h2>
                <form method="POST" action="{{ route('admin.categories.store') }}" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="label">Nama Kategori</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Pengumuman" class="field" required>
                    </div>
                    <div>
                        <label for="description" class="label">Deskripsi (opsional)</label>
                        <textarea id="description" name="description" rows="3" placeholder="Deskripsi kategori..." class="field resize-y">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">
                        <x-icon name="plus" class="h-4 w-4" />
                        Tambah Kategori
                    </button>
                </form>
            </div>

            <div id="edit-form" class="hidden rounded-lg border border-gold/40 bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <div class="flex items-center justify-between">
                    <h2 class="font-sans text-lg text-primary">Edit Kategori</h2>
                    <button type="button" data-cancel-edit class="flex h-8 w-8 items-center justify-center rounded-md border border-line text-muted hover:text-primary" aria-label="Batal edit">
                        <x-icon name="x" class="h-4 w-4" />
                    </button>
                </div>
                <form method="POST" action="" class="mt-4 space-y-4" id="edit-form-element">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="edit-name" class="label">Nama Kategori</label>
                        <input id="edit-name" type="text" name="name" class="field" required>
                    </div>
                    <div>
                        <label for="edit-description" class="label">Deskripsi (opsional)</label>
                        <textarea id="edit-description" name="description" rows="3" class="field resize-y"></textarea>
                    </div>
                    <button type="submit" class="btn-gold w-full">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtns = document.querySelectorAll('[data-edit-category]');
            const editForm = document.getElementById('edit-form');
            const createForm = document.getElementById('create-form');
            const formEl = document.getElementById('edit-form-element');
            const nameInput = document.getElementById('edit-name');
            const descInput = document.getElementById('edit-description');

            editBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    formEl.action = btn.dataset.editCategory ? `/admin/kategori/${btn.dataset.editCategory}` : '';
                    nameInput.value = btn.dataset.name || '';
                    descInput.value = btn.dataset.description || '';
                    createForm.classList.add('hidden');
                    editForm.classList.remove('hidden');
                    nameInput.focus();
                });
            });
            document.querySelector('[data-cancel-edit]')?.addEventListener('click', () => {
                editForm.classList.add('hidden');
                createForm.classList.remove('hidden');
            });
        });
    </script>
</x-admin-layouts.app>