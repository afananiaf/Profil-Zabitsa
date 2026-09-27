<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class AboutController extends Controller
{
    public function history()
    {
        return View::make('pages.about.history');
    }

    public function vision()
    {
        return View::make('pages.about.vision');
    }
}