<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $featured = Activity::where('is_featured', true)->latest('start_date')->first();

        $upcoming = Activity::upcoming()->latest('start_date')->take(3)->get();

        $past = Activity::past()
            ->orderByDesc('end_date')
            ->orderByDesc('start_date')
            ->take(3)
            ->get();

        $all = Activity::latest('start_date')->latest('id')
            ->when($featured, fn ($q) => $q->where('id', '!=', $featured->id))
            ->paginate(6);

        return View::make('pages.activities.index', [
            'featured' => $featured,
            'upcoming' => $upcoming,
            'past' => $past,
            'all' => $all,
        ]);
    }

    public function calendar(Request $request)
    {
        $month = (int) ($request->input('month') ?? now()->month);
        $year = (int) ($request->input('year') ?? now()->year);
        $month = max(1, min(12, $month));
        $year = max(2000, min(2100, $year));

        $firstDay = Carbon::create($year, $month, 1);
        $prev = $firstDay->copy()->subMonth();
        $next = $firstDay->copy()->addMonth();

        $activities = Activity::whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->orWhere(function ($q) use ($year, $month) {
                $q->whereYear('end_date', $year)->whereMonth('end_date', $month);
            })
            ->get();

        $byDate = $activities->groupBy(fn ($a) => optional($a->start_date)->format('Y-m-d'));

        $daysInMonth = $firstDay->daysInMonth;
        $leading = $firstDay->dayOfWeek; // 0 = Sunday
        $weeks = [];
        $cell = 0;
        for ($i = 0; $i < $leading; $i++) {
            $weeks[] = null;
            $cell++;
        }
        for ($d = 1; $d <= $daysInMonth; $d++) {
            $date = Carbon::create($year, $month, $d);
            $weeks[] = (object) [
                'day' => $d,
                'date' => $date,
                'items' => $byDate->get($date->format('Y-m-d'), collect()),
                'today' => $date->isToday(),
            ];
            $cell++;
        }
        while ($cell % 7 !== 0) {
            $weeks[] = null;
            $cell++;
        }
        $weeks = collect($weeks)->chunk(7)->map(fn ($c) => $c->values());

        return View::make('pages.activities.calendar', [
            'month' => $month,
            'year' => $year,
            'firstDay' => $firstDay,
            'prev' => $prev,
            'next' => $next,
            'weeks' => $weeks,
            'activities' => $activities,
        ]);
    }

    public function show(Activity $activity)
    {
        $others = Activity::where('id', '!=', $activity->id)
            ->latest('start_date')
            ->take(3)
            ->get();

        return View::make('pages.activities.show', [
            'activity' => $activity,
            'others' => $others,
        ]);
    }
}