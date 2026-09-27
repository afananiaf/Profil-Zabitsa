<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Document;
use App\Models\EducationLevel;
use App\Models\Figure;
use App\Models\NewsArticle;
use App\Models\OrganizationStructure;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __invoke()
    {
        $featuredNews = NewsArticle::published()
            ->with('category')
            ->where('is_featured', true)
            ->latest('published_at')
            ->take(1)
            ->get();

        $latestNews = NewsArticle::published()
            ->with('category')
            ->latest('published_at')
            ->when($featuredNews->isNotEmpty(), fn ($q) => $q->whereNotIn('id', $featuredNews->pluck('id')))
            ->take($featuredNews->isNotEmpty() ? 5 : 6)
            ->get();

        $upcomingActivities = Activity::upcoming()
            ->latest('start_date')
            ->take(3)
            ->get();

        $latestActivities = Activity::latest('start_date')
            ->latest('id')
            ->take(3)
            ->get();

        $levels = EducationLevel::orderBy('order_column')->take(3)->get();
        $documents = Document::latest('uploaded_at')->latest('id')->take(4)->get();
        $structureTop = OrganizationStructure::whereNull('parent_id')->orderBy('order_column')->take(4)->get();

        $stats = [
            ['value' => (string) (now()->year - 2000), 'label' => 'Tahun Perjalanan', 'note' => 'Sejak 2000'],
            ['value' => '—', 'label' => 'Peserta Didik', 'note' => 'Data resmi menyusul'],
            ['value' => '—', 'label' => 'Pengajar & Staf', 'note' => 'Data resmi menyusul'],
            ['value' => '5', 'label' => 'Program Unggulan', 'note' => 'Tahfidz hingga madrasah diniyah'],
        ];

        return View::make('pages.home', compact(
            'featuredNews',
            'latestNews',
            'upcomingActivities',
            'latestActivities',
            'levels',
            'documents',
            'structureTop',
            'stats'
        ));
    }
}