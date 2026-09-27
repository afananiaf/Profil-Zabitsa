<x-admin-layouts.app title="{{ $document->exists ? 'Edit Dokumen' : 'Unggah Dokumen' }}">
    <form method="POST" action="{{ $document->exists ? route('admin.documents.update', $document) : route('admin.documents.store') }}" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @if ($document->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div>
                <label for="title" class="label">Nama Dokumen</label>
                <input id="title" type="text" name="title" value="{{ old('title', $document->title) }}" placeholder="Contoh: Profil Wilayah Zaid bin Tsabit" class="field" required>
                @error('title') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="category" class="label">Kategori</label>
                <input id="category" type="text" name="category" value="{{ old('category', $document->category) }}" placeholder="Contoh: Profil, Panduan, Formulir" class="field">
            </div>
            <div>
                <label for="description" class="label">Deskripsi</label>
                <textarea id="description" name="description" rows="3" placeholder="Deskripsi dokumen..." class="field resize-y">{{ old('description', $document->description) }}</textarea>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="uploaded_at" class="label">Tanggal Unggah</label>
                    <input id="uploaded_at" type="date" name="uploaded_at" value="{{ old('uploaded_at', $document->uploaded_at?->format('Y-m-d')) }}" class="field">
                    <p class="mt-1.5 text-xs text-muted">Kosongkan untuk menggunakan tanggal hari ini.</p>
                </div>
                <div>
                    <label for="file" class="label">Berkas</label>
                    <input id="file" type="file" name="file" class="block w-full text-sm text-muted file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-3 file:py-2 file:text-[12px] file:font-semibold file:text-white hover:file:bg-dark">
                    @error('file') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                    @if ($document->file_path)
                        <p class="mt-1.5 text-xs text-muted">Berkas saat ini: {{ basename($document->file_path) }} ({{ $document->size_label }}). Unggah berkas baru untuk mengganti.</p>
                    @endif
                    <p class="mt-1.5 text-xs text-muted">PDF, DOC, XLS, ZIP, dll. Maksimal 20 MB.</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="btn-primary">
                <x-icon name="check" class="h-4 w-4" />
                Simpan Dokumen
            </button>
            <a href="{{ route('admin.documents.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</x-admin-layouts.app>