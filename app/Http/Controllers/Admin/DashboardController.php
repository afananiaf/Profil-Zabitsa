<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Document;
use App\Models\Figure;
use App\Models\Message;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        return View::make('admin.dashboard', [
            'stats' => [
                'news' => NewsArticle::count(),
                'newsPublished' => NewsArticle::published()->count(),
                'activities' => Activity::count(),
                'figures' => Figure::where('status', true)->count(),
                'documents' => Document::count(),
                'messages' => Message::count(),
                'messagesUnread' => Message::where('is_read', false)->count(),
            ],
            'latestMessages' => Message::latest()->take(5)->get(),
            'latestNews' => NewsArticle::with('category')->latest()->take(5)->get(),
            'latestActivities' => Activity::latest()->take(5)->get(),
        ]);
    }
}