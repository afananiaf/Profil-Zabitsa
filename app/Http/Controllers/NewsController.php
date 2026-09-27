<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsArticle::published()->with('category');

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                    ->orWhere('excerpt', 'like', '%' . $request->q . '%')
                    ->orWhere('content', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        $featured = NewsArticle::published()
            ->with('category')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $articles = $query->latest('published_at')
            ->when($featured && $request->missing('q') && $request->missing('category'), fn ($q) => $q->where('id', '!=', $featured->id))
            ->paginate(9)
            ->withQueryString();

        $categories = Category::withCount(['newsArticles' => fn ($q) => $q->published()])->orderBy('name')->get();

        return View::make('pages.news.index', [
            'featured' => $featured,
            'articles' => $articles,
            'categories' => $categories,
            'selectedCategory' => $request->input('category', 'semua'),
            'keyword' => $request->input('q', ''),
        ]);
    }

    public function archive(Request $request)
    {
        $query = NewsArticle::published()->with('category');

        $years = NewsArticle::published()
            ->selectRaw("strftime('%Y', published_at) as year")
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        if ($request->filled('year')) {
            $query->whereYear('published_at', $request->year);
        }

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        $archives = $query->latest('published_at')->paginate(12)->withQueryString();
        $categories = Category::withCount('newsArticles')->orderBy('name')->get();

        return View::make('pages.news.archive', [
            'archives' => $archives,
            'categories' => $categories,
            'years' => $years,
            'selectedCategory' => $request->input('category', 'semua'),
            'selectedYear' => $request->input('year', ''),
        ]);
    }

    public function show(NewsArticle $article)
    {
        abort_if($article->status !== 'published' || !$article->published_at || $article->published_at->gt(now()), 404);

        $related = NewsArticle::published()
            ->with('category')
            ->where('id', '!=', $article->id)
            ->when($article->category_id, fn ($q) => $q->where('category_id', $article->category_id))
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($related->isEmpty()) {
            $related = NewsArticle::published()
                ->with('category')
                ->where('id', '!=', $article->id)
                ->latest('published_at')
                ->take(3)
                ->get();
        }

        return View::make('pages.news.show', [
            'article' => $article,
            'related' => $related,
        ]);
    }
}