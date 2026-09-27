<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    protected $fillable = [
        'name', 'slug', 'role', 'category', 'short_bio', 'bio', 'education',
        'journey', 'contributions', 'photo', 'status', 'order_column',
    ];

    public function getInitialsAttribute(): string
    {
        $words = preg_split('/\s+/', trim($this->name));
        $initials = collect($words)->take(2)->map(fn ($w) => mb_substr($w, 0, 1))->implode('');

        return strtoupper($initials ?: 'ZT');
    }
}