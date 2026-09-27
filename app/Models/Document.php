<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'file_path', 'file_size', 'description', 'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    public function getSizeLabelAttribute(): string
    {
        if (!$this->file_size) {
            return '---';
        }

        $bytes = (float) $this->file_size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 0) . ' KB';
        }
        return number_format($bytes, 0) . ' B';
    }

    public function getExtensionAttribute(): string
    {
        $path = $this->file_path ?: $this->title;
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        return strtoupper($ext ?: 'FILE');
    }
}