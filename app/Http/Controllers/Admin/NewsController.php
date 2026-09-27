<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    use InteractsWithSlugs;

    public function index(Request $request)
    {
        $news = NewsArticle::with(['category', 'author'])
            ->when($request->filled('status') && $request->status !== 'semua', fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('q'), fn ($q) => $q->where('title', 'like', '%' . $request->q . '%'))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return View::make('admin.news.index', ['news' => $news]);
    }

    public function create()
    {
        return View::make('admin.news.form', [
            'article' => new NewsArticle(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(NewsArticle::class, $data['title']);
        $data['author_id'] = $request->user()->id;
        $data['thumbnail'] = $this->storeUpload($request->file('thumbnail'), 'news');

        NewsArticle::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil disimpan.');
    }

    public function edit(NewsArticle $article)
    {
        return View::make('admin.news.form', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, NewsArticle $article)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(NewsArticle::class, $data['title'], $article->id);

        if ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $this->storeUpload($request->file('thumbnail'), 'news');
        }

        $article->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(NewsArticle $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        $article->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string', 'max:400'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['sometimes', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif', 'max:4096'],
        ], [
            'title.required' => 'Judul wajib diisi.',
            'content.required' => 'Isi berita wajib diisi.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 4 MB.',
        ]);
    }
}