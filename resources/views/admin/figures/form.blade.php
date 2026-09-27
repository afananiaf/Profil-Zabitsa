<x-admin-layouts.app title="{{ $figure->exists ? 'Edit Tokoh' : 'Tokoh Baru' }}">
    <form method="POST" action="{{ $figure->exists ? route('admin.figures.update', $figure) : route('admin.figures.store') }}" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-[1fr_320px]">
        @csrf
        @if ($figure->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="label">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $figure->name) }}" placeholder="Nama tokoh" class="field" required>
                    @error('name') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="role" class="label">Peran / Jabatan</label>
                    <input id="role" type="text" name="role" value="{{ old('role', $figure->role) }}" placeholder="Contoh: Koordinator Bidang Pendidikan" class="field">
                </div>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="category" class="label">Kategori</label>
                    <input id="category" type="text" name="category" value="{{ old('category', $figure->category) }}" placeholder="Contoh: pengarah, pimpinan, pelaksana" class="field">
                </div>
                <div>
                    <label for="order_column" class="label">Urutan</label>
                    <input id="order_column" type="number" name="order_column" value="{{ old('order_column', $figure->order_column ?? 0) }}" min="0" class="field">
                </div>
            </div>
            <div>
                <label for="short_bio" class="label">Deskripsi Singkat</label>
                <textarea id="short_bio" name="short_bio" rows="3" placeholder="Deskripsi singkat untuk kartu tokoh..." class="field resize-y">{{ old('short_bio', $figure->short_bio) }}</textarea>
                @error('short_bio') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="bio" class="label">Biografi Lengkap <span class="font-normal text-muted">(mendukung HTML sederhana)</span></label>
                <textarea id="bio" name="bio" rows="8" placeholder="Biografi lengkap tokoh..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('bio', $figure->bio) }}</textarea>
            </div>
            <div>
                <label for="education" class="label">Riwayat Pendidikan</label>
                <textarea id="education" name="education" rows="4" placeholder="Riwayat pendidikan..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('education', $figure->education) }}</textarea>
            </div>
            <div>
                <label for="journey" class="label">Perjalanan</label>
                <textarea id="journey" name="journey" rows="4" placeholder="Perjalanan pengabdian..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('journey', $figure->journey) }}</textarea>
            </div>
            <div>
                <label for="contributions" class="label">Kontribusi</label>
                <textarea id="contributions" name="contributions" rows="4" placeholder="Kontribusi bagi wilayah..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('contributions', $figure->contributions) }}</textarea>
            </div>
        </div>

        <div class="space-y-5">
            <div class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <label for="photo" class="label">Foto Tokoh</label>
                @if ($figure->photo)
                    <img src="{{ asset('storage/' . $figure->photo) }}" alt="Foto saat ini" class="mb-3 aspect-square w-full rounded-md border border-line object-cover">
                @endif
                <input id="photo" type="file" name="photo" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-muted file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-4 file:py-2.5 file:text-[13px] file:font-semibold file:text-white hover:file:bg-dark">
                @error('photo') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                <p class="mt-2 text-xs text-muted">JPG, PNG, atau WebP. Maksimal 4 MB.</p>
            </div>
            <div class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <label class="flex items-center gap-2.5 text-sm text-ink/80">
                    <input type="checkbox" name="status" value="1" @checked(old('status', $figure->status ?? true)) class="h-4 w-4 rounded border-line accent-primary">
                    Tampilkan di website
                </label>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <x-icon name="check" class="h-4 w-4" />
                    Simpan Tokoh
                </button>
                <a href="{{ route('admin.figures.index') }}" class="btn-outline">Batal</a>
            </div>
        </div>
    </form>
</x-admin-layouts.app>