<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'image', 'location',
        'start_date', 'end_date', 'status', 'is_featured',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
    ];

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('status', 'planned')
            ->where(function ($q) {
                $q->whereNull('start_date')->orWhere('start_date', '>=', now());
            });
    }

    public function scopePast(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'planned' => 'Akan Datang',
            'ongoing' => 'Berlangsung',
            'completed' => 'Selesai',
            default => $this->status,
        };
    }

    public function getDateRangeAttribute(): string
    {
        if (!$this->start_date && !$this->end_date) {
            return 'Jadwal menyusul';
        }
        if ($this->start_date && $this->end_date && $this->start_date->eq($this->end_date)) {
            return $this->start_date->translatedFormat('d F Y');
        }
        if ($this->start_date && $this->end_date) {
            return $this->start_date->translatedFormat('d F Y')
                . ' \u2013 ' . $this->end_date->translatedFormat('d F Y');
        }
        return ($this->start_date ?? $this->end_date)->translatedFormat('d F Y');
    }
}