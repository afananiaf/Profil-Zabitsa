<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class FigureController extends Controller
{
    use InteractsWithSlugs;

    public function index()
    {
        return View::make('admin.figures.index', [
            'figures' => Figure::orderBy('order_column')->orderBy('name')->paginate(15),
        ]);
    }

    public function create()
    {
        return View::make('admin.figures.form', ['figure' => new Figure()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(Figure::class, $data['name']);
        $data['photo'] = $this->storeUpload($request->file('photo'), 'figures');
        $data['status'] = $request->boolean('status');

        Figure::create($data);

        return redirect()->route('admin.figures.index')->with('success', 'Tokoh berhasil disimpan.');
    }

    public function edit(Figure $figure)
    {
        return View::make('admin.figures.form', ['figure' => $figure]);
    }

    public function update(Request $request, Figure $figure)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(Figure::class, $data['name'], $figure->id);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('photo')) {
            if ($figure->photo) {
                Storage::disk('public')->delete($figure->photo);
            }
            $data['photo'] = $this->storeUpload($request->file('photo'), 'figures');
        }

        $figure->update($data);

        return redirect()->route('admin.figures.index')->with('success', 'Tokoh berhasil diperbarui.');
    }

    public function destroy(Figure $figure)
    {
        if ($figure->photo) {
            Storage::disk('public')->delete($figure->photo);
        }
        $figure->delete();

        return redirect()->route('admin.figures.index')->with('success', 'Tokoh berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'role' => ['nullable', 'string', 'max:160'],
            'category' => ['nullable', 'string', 'max:80'],
            'short_bio' => ['nullable', 'string', 'max:400'],
            'bio' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'journey' => ['nullable', 'string'],
            'contributions' => ['nullable', 'string'],
            'status' => ['sometimes', 'boolean'],
            'order_column' => ['nullable', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:4096'],
        ], [
            'name.required' => 'Nama tokoh wajib diisi.',
            'photo.max' => 'Ukuran foto maksimal 4 MB.',
        ]);
    }
}