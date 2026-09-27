<?php

namespace App\Http\Controllers;

use App\Models\OrganizationStructure;
use Illuminate\Support\Facades\View;

class StructureController extends Controller
{
    public function index()
    {
        $topLevel = OrganizationStructure::whereNull('parent_id')
            ->orderBy('order_column')
            ->get();

        $nodes = OrganizationStructure::orderBy('generation')
            ->orderBy('order_column')
            ->get()
            ->groupBy('generation');

        return View::make('pages.structures.index', [
            'topLevel' => $topLevel,
            'nodes' => $nodes,
        ]);
    }
}