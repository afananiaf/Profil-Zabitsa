<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class EducationLevelController extends Controller
{
    use InteractsWithSlugs;

    public function index()
    {
        return View::make('admin.education.index', [
            'levels' => EducationLevel::orderBy('order_column')->paginate(15),
        ]);
    }

    public function create()
    {
        return View::make('admin.education.form', ['level' => new EducationLevel()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(EducationLevel::class, $data['name']);

        EducationLevel::create($data);

        return redirect()->route('admin.education.index')->with('success', 'Jenjang pendidikan berhasil disimpan.');
    }

    public function edit(EducationLevel $level)
    {
        return View::make('admin.education.form', ['level' => $level]);
    }

    public function update(Request $request, EducationLevel $level)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(EducationLevel::class, $data['name'], $level->id);

        $level->update($data);

        return redirect()->route('admin.education.index')->with('success', 'Jenjang pendidikan berhasil diperbarui.');
    }

    public function destroy(EducationLevel $level)
    {
        $level->delete();

        return redirect()->route('admin.education.index')->with('success', 'Jenjang pendidikan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'short_name' => ['nullable', 'string', 'max:80'],
            'icon' => ['nullable', 'string', 'max:40'],
            'description' => ['nullable', 'string', 'max:600'],
            'duration' => ['nullable', 'string', 'max:80'],
            'overview' => ['nullable', 'string'],
            'objectives' => ['nullable', 'string'],
            'curriculum' => ['nullable', 'string'],
            'programs' => ['nullable', 'string'],
            'activities' => ['nullable', 'string'],
            'info' => ['nullable', 'string'],
            'order_column' => ['nullable', 'integer', 'min:0'],
        ], [
            'name.required' => 'Nama jenjang wajib diisi.',
        ]);
    }
}