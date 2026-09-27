<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ActivityController extends Controller
{
    use InteractsWithSlugs;

    public function index()
    {
        return View::make('admin.activities.index', [
            'activities' => Activity::latest('start_date')->paginate(15),
        ]);
    }

    public function create()
    {
        return View::make('admin.activities.form', ['activity' => new Activity()]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(Activity::class, $data['title']);
        $data['image'] = $this->storeUpload($request->file('image'), 'activities');

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil disimpan.');
    }

    public function edit(Activity $activity)
    {
        return View::make('admin.activities.form', ['activity' => $activity]);
    }

    public function update(Request $request, Activity $activity)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug(Activity::class, $data['title'], $activity->id);

        if ($request->hasFile('image')) {
            if ($activity->image) {
                Storage::disk('public')->delete($activity->image);
            }
            $data['image'] = $this->storeUpload($request->file('image'), 'activities');
        }

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->image) {
            Storage::disk('public')->delete($activity->image);
        }
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:600'],
            'content' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:200'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'in:planned,ongoing,completed'],
            'is_featured' => ['sometimes', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,webp,gif', 'max:4096'],
        ], [
            'title.required' => 'Judul kegiatan wajib diisi.',
            'end_date.after_or_equal' => 'Tanggal selesai harus setelah tanggal mulai.',
            'image.max' => 'Ukuran gambar maksimal 4 MB.',
        ]);
    }
}