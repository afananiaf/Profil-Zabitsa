<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::query();

        if ($request->filled('category') && $request->category !== 'semua') {
            $query->where('category', $request->category);
        }

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                    ->orWhere('description', 'like', '%' . $request->q . '%');
            });
        }

        $documents = $query->latest('uploaded_at')->latest('id')->paginate(10)->withQueryString();

        $categories = Document::select('category')->distinct()->orderBy('category')->pluck('category');

        return View::make('pages.documents.index', [
            'documents' => $documents,
            'categories' => $categories,
            'selectedCategory' => $request->input('category', 'semua'),
            'keyword' => $request->input('q', ''),
        ]);
    }

    public function download(Document $document)
    {
        abort_if(!$document->file_path, 404, 'Dokumen belum tersedia.');

        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'Berkas dokumen tidak ditemukan.');
        }

        return Storage::disk('public')->download($document->file_path, $document->title . '.' . pathinfo($document->file_path, PATHINFO_EXTENSION));
    }
}