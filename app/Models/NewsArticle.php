<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsArticle extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'slug', 'category_id', 'excerpt', 'content', 'thumbnail',
        'published_at', 'author_id', 'status', 'is_featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->published_at
            ? Carbon::parse($this->published_at)->translatedFormat('d F Y')
            : '';
    }

    public function getFullDateAttribute(): string
    {
        return $this->published_at
            ? Carbon::parse($this->published_at)->translatedFormat('l, d F Y')
            : '';
    }
}