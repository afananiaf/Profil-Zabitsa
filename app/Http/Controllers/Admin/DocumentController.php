<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class DocumentController extends Controller
{
    use InteractsWithSlugs;

    public function index()
    {
        return View::make('admin.documents.index', [
            'documents' => Document::latest('uploaded_at')->paginate(15),
        ]);
    }

    public function create()
    {
        return View::make('admin.documents.form', ['document' => new Document()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $data['slug'] = $this->makeSlug(Document::class, $data['title']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $data['file_path'] = $file->store('documents', 'public');
            $data['file_size'] = $file->getSize();
        }

        if (!$request->filled('uploaded_at')) {
            $data['uploaded_at'] = now();
        }

        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil disimpan.');
    }

    public function edit(Document $document)
    {
        return View::make('admin.documents.form', ['document' => $document]);
    }

    public function update(Request $request, Document $document)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(Document::class, $data['title'], $document->id);

        if ($request->hasFile('file')) {
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }
            $file = $request->file('file');
            $data['file_path'] = $file->store('documents', 'public');
            $data['file_size'] = $file->getSize();
        }

        $document->update($data);

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Document $document)
    {
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'category' => ['nullable', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:600'],
            'uploaded_at' => ['nullable', 'date'],
            'file' => ['nullable', 'file', 'max:20480'],
        ], [
            'title.required' => 'Nama dokumen wajib diisi.',
            'file.max' => 'Ukuran berkas maksimal 20 MB.',
        ]);
    }
}