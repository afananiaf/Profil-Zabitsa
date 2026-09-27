<x-admin-layouts.app title="{{ $node->exists ? 'Edit Struktur Organisasi' : 'Tambah Struktur Organisasi' }}">
    <form method="POST" action="{{ $node->exists ? route('admin.structures.update', $node) : route('admin.structures.store') }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @if ($node->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="label">Nama Pengurus / Bagian</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $node->name) }}" placeholder="Nama pengurus atau nama bagian" class="field" required>
                    @error('name') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="position" class="label">Jabatan / Peran</label>
                    <input id="position" type="text" name="position" value="{{ old('position', $node->position) }}" placeholder="Contoh: Pimpinan Wilayah" class="field">
                </div>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="generation" class="label">Tingkatan</label>
                    <select id="generation" name="generation" class="field">
                        <option value="0" @selected(old('generation', $node->generation ?? 0) == 0)>1 · Pengarah &amp; Pengawas</option>
                        <option value="1" @selected(old('generation', $node->generation ?? 0) == 1)>2 · Pimpinan Eksekutif</option>
                        <option value="2" @selected(old('generation', $node->generation ?? 0) == 2)>3 · Pelaksana Teknis</option>
                    </select>
                    @error('generation') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="parent_id" class="label">Bagian Induk / Atasan (opsional)</label>
                    <select id="parent_id" name="parent_id" class="field">
                        <option value="">— Tanpa induk (puncak struktur) —</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent['value'] }}" @selected((string) old('parent_id', $node->parent_id ?? '') === (string) $parent['value'])>{{ $parent['label'] }}</option>
                        @endforeach
                    </select>
                    @error('parent_id') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label for="description" class="label">Deskripsi Peran</label>
                <textarea id="description" name="description" rows="4" placeholder="Deskripsi tugas dan tanggung jawab..." class="field resize-y">{{ old('description', $node->description) }}</textarea>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="order_column" class="label">Urutan Tampil</label>
                    <input id="order_column" type="number" name="order_column" value="{{ old('order_column', $node->order_column ?? 0) }}" min="0" class="field">
                </div>
                <div>
                    <label for="photo" class="label">Foto (opsional)</label>
                    <input id="photo" type="file" name="photo" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-muted file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-3 file:py-2 file:text-[12px] file:font-semibold file:text-white hover:file:bg-dark">
                    @error('photo') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="btn-primary">
                <x-icon name="check" class="h-4 w-4" />
                Simpan
            </button>
            <a href="{{ route('admin.structures.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</x-admin-layouts.app>