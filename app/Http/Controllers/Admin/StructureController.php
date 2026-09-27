<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class StructureController extends Controller
{
    use InteractsWithSlugs;

    public function index()
    {
        $structures = OrganizationStructure::with('children.children')
            ->whereNull('parent_id')
            ->orderBy('order_column')
            ->get();

        return View::make('admin.structures.index', ['structures' => $structures]);
    }

    public function create()
    {
        return View::make('admin.structures.form', [
            'node' => new OrganizationStructure(['generation' => 0]),
            'parents' => $this->parentOptions(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['photo'] = $this->storeUpload($request->file('photo'), 'structures');

        OrganizationStructure::create($data);

        return redirect()->route('admin.structures.index')->with('success', 'Struktur organisasi berhasil disimpan.');
    }

    public function edit(OrganizationStructure $structure)
    {
        return View::make('admin.structures.form', [
            'node' => $structure,
            'parents' => $this->parentOptions($structure),
        ]);
    }

    public function update(Request $request, OrganizationStructure $structure)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('photo')) {
            if ($structure->photo) {
                Storage::disk('public')->delete($structure->photo);
            }
            $data['photo'] = $this->storeUpload($request->file('photo'), 'structures');
        }

        $structure->update($data);

        return redirect()->route('admin.structures.index')->with('success', 'Struktur organisasi berhasil diperbarui.');
    }

    public function destroy(OrganizationStructure $structure)
    {
        if ($structure->photo) {
            Storage::disk('public')->delete($structure->photo);
        }
        $structure->children()->update(['parent_id' => null]);
        $structure->delete();

        return redirect()->route('admin.structures.index')->with('success', 'Struktur organisasi berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'position' => ['nullable', 'string', 'max:160'],
            'generation' => ['nullable', 'integer', 'in:0,1,2'],
            'parent_id' => ['nullable', 'integer', 'exists:organization_structures,id'],
            'description' => ['nullable', 'string', 'max:600'],
            'order_column' => ['nullable', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,webp', 'max:4096'],
        ], [
            'name.required' => 'Nama pengurus wajib diisi.',
            'generation.in' => 'Tingkatan yang dipilih tidak valid.',
        ]);
    }

    private function parentOptions(?OrganizationStructure $except = null): array
    {
        return OrganizationStructure::orderBy('generation')
            ->orderBy('order_column')
            ->get()
            ->reject(fn ($node) => $except && $node->id === $except->id)
            ->map(fn ($node) => [
                'value' => $node->id,
                'label' => ($node->parent ? str_repeat('─ ', $node->generation) : '') . $node->name . ($node->position ? ' · ' . $node->position : ''),
            ])
            ->values()
            ->all();
    }
}