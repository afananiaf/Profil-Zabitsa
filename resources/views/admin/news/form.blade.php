<x-admin-layouts.app title="{{ $article->exists ? 'Edit Berita' : 'Berita Baru' }}">
    <form method="POST" action="{{ $article->exists ? route('admin.news.update', $article) : route('admin.news.store') }}" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-[1fr_320px]">
        @csrf
        @if ($article->exists) @method('PUT') @endif

        <div class="space-y-5 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
            <div>
                <label for="title" class="label">Judul Berita</label>
                <input id="title" type="text" name="title" value="{{ old('title', $article->title) }}" placeholder="Judul berita" class="field" required>
                @error('title') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="excerpt" class="label">Ringkasan (Excerpt)</label>
                <textarea id="excerpt" name="excerpt" rows="3" placeholder="Ringkasan singkat berita..." class="field resize-y">{{ old('excerpt', $article->excerpt) }}</textarea>
                @error('excerpt') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="content" class="label">Isi Berita <span class="font-normal text-muted">(mendukung HTML sederhana: &lt;p&gt;, &lt;h2&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;blockquote&gt;)</span></label>
                <textarea id="content" name="content" rows="14" placeholder="Tulis isi berita..." class="field resize-y font-mono !text-[13px] leading-6" required>{{ old('content', $article->content) }}</textarea>
                @error('content') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="space-y-5">
            <div class="space-y-4 rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <div>
                    <label for="category_id" class="label">Kategori</label>
                    <select id="category_id" name="category_id" class="field appearance-none pr-8">
                        <option value="">Tanpa Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected((int) old('category_id', $article->category_id) === $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="published_at" class="label">Tanggal Terbit</label>
                    <input id="published_at" type="datetime-local" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}" class="field">
                    @error('published_at') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" class="field appearance-none pr-8">
                        <option value="draft" @selected(old('status', $article->status) === 'draft')>Draft</option>
                        <option value="published" @selected(old('status', $article->status) === 'published')>Terbit</option>
                    </select>
                </div>
                <label class="flex items-center gap-2.5 text-sm text-ink/80">
                    <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $article->is_featured)) class="h-4 w-4 rounded border-line accent-primary">
                    Jadikan berita unggulan
                </label>
            </div>

            <div class="rounded-lg border border-line bg-white p-6 shadow-[0_1px_3px_rgba(11,36,27,0.05)]">
                <label for="thumbnail" class="label">Thumbnail</label>
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail saat ini" class="mb-3 aspect-[16/9] w-full rounded-md border border-line object-cover">
                @endif
                <input id="thumbnail" type="file" name="thumbnail" accept="image/jpeg,image/png,image/webp" class="block w-full text-sm text-muted file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-4 file:py-2.5 file:text-[13px] file:font-semibold file:text-white hover:file:bg-dark">
                @error('thumbnail') <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p> @enderror
                <p class="mt-2 text-xs text-muted">JPG, PNG, atau WebP. Maksimal 4 MB. Apabila tidak diunggah, placeholder otomatis digunakan.</p>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary flex-1">
                    <x-icon name="check" class="h-4 w-4" />
                    Simpan Berita
                </button>
                <a href="{{ route('admin.news.index') }}" class="btn-outline">Batal</a>
            </div>
        </div>
    </form>
</x-admin-layouts.app>