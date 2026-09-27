<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Support\Facades\View;

class EducationController extends Controller
{
    public function index()
    {
        $levels = EducationLevel::orderBy('order_column')->paginate(9);

        return View::make('pages.education.index', ['levels' => $levels]);
    }

    public function show(EducationLevel $level)
    {
        $others = EducationLevel::where('id', '!=', $level->id)
            ->orderBy('order_column')
            ->take(3)
            ->get();

        return View::make('pages.education.show', [
            'level' => $level,
            'others' => $others,
        ]);
    }
}