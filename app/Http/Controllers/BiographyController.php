<?php

namespace App\Http\Controllers;

use App\Models\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BiographyController extends Controller
{
    public function index(Request $request)
    {
        $query = Figure::where('status', true);

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('role', 'like', '%' . $request->q . '%')
                    ->orWhere('short_bio', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->where('category', strtolower($request->category));
        }

        $figures = $query->orderBy('order_column')->orderBy('name')->paginate(12)->withQueryString();

        $categories = Figure::where('status', true)
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return View::make('pages.biographies.index', [
            'figures' => $figures,
            'categories' => $categories,
            'selectedCategory' => $request->input('category', 'semua'),
            'keyword' => $request->input('q', ''),
        ]);
    }

    public function show(Figure $figure)
    {
        abort_unless($figure->status, 404);

        $others = Figure::where('status', true)
            ->where('id', '!=', $figure->id)
            ->orderBy('order_column')
            ->take(3)
            ->get();

        return View::make('pages.biographies.show', [
            'figure' => $figure,
            'others' => $others,
        ]);
    }
}