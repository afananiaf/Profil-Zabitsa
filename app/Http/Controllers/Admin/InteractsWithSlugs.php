<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait InteractsWithSlugs
{
    protected function makeSlug(string $modelClass, string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'item';
        $slug = $base;
        $i = 2;

        while ($modelClass::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    protected function storeUpload(?UploadedFile $file, string $dir): ?string
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        return $file->store($dir, 'public');
    }
}