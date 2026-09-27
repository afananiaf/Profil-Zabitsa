<x-admin-layouts.app title="{{ $activity->exists ? 'Edit Kegiatan' : 'Kegiatan Baru' }}">
    <form method="POST" action="{{ $activity->exists ? route('admin.activities.update', $activity) : route('admin.activities.store') }}" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-[1fr_320px]">
        @csrf
        @if ($activity->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div>
                <label for="title" class="label">Judul Kegiatan</label>
                <input id="title" type="text" name="title" value="{{ old('title', $activity->title) }}" placeholder="Judul kegiatan" class="field" required>
                @error('title') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="description" class="label">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="3" placeholder="Deskripsi singkat kegiatan..." class="field resize-y">{{ old('description', $activity->description) }}</textarea>
                @error('description') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="content" class="label">Konten Lengkap <span class="font-normal text-muted">(opsional, mendukung HTML sederhana)</span></label>
                <textarea id="content" name="content" rows="10" placeholder="Informasi lengkap kegiatan..." class="field resize-y font-mono !text-[13px] leading-6">{{ old('content', $activity->content) }}</textarea>
            </div>
        </div>

        <div class="space-y-5">
            <div class="space-y-4 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <div>
                    <label for="location" class="label">Lokasi</label>
                    <input id="location" type="text" name="location" value="{{ old('location', $activity->location) }}" placeholder="Tempat pelaksanaan" class="field">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="label">Tanggal Mulai</label>
                        <input id="start_date" type="date" name="start_date" value="{{ old('start_date', $activity->start_date?->format('Y-m-d')) }}" class="field">
                    </div>
                    <div>
                        <label for="end_date" class="label">Tanggal Selesai</label>
                        <input id="end_date" type="date" name="end_date" value="{{ old('end_date', $activity->end_date?->format('Y-m-d')) }}" class="field">
                    </div>
                </div>
                @error('end_date') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" class="field appearance-none pr-8">
                        <option value="planned" @selected(old('status', $activity->status) === 'planned')>Akan Datang</option>
                        <option value="ongoing" @selected(old('status', $activity->status) === 'ongoing')>Berlangsung</option>
                        <option value="completed" @selected(old('status', $activity->status) === 'completed')>Selesai</option>
                    </select>
                </div>
                <label class="flex items-center gap-2.5 text-sm text-ink/80">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $activity->is_featured)) class="h-4 w-4 rounded border-line accent-primary">
                    Jadikan kegiatan unggulan
                </label>
            </div>

            <div class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <label for="image" class="label">Gambar Kegiatan</label>
                @if ($activity->image)
                    <img src="{{ asset('storage/' . $activity->image) }}" alt="Gambar saat ini" class="mb-3 aspect-[16/9] w-full rounded-md border border-line object-cover">
                @endif
                <input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-muted file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-4 file:py-2.5 file:text-[13px] file:font-semibold file:text-white hover:file:bg-dark">
                @error('image') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                <p class="mt-2 text-xs text-muted">JPG, PNG, atau WebP. Maksimal 4 MB.</p>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <x-icon name="check" class="h-4 w-4" />
                    Simpan Kegiatan
                </button>
                <a href="{{ route('admin.activities.index') }}" class="btn-outline">Batal</a>
            </div>
        </div>
    </form>
</x-admin-layouts.app>