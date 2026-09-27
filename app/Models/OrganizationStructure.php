<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationStructure extends Model
{
    protected $fillable = [
        'parent_id', 'name', 'position', 'photo', 'description', 'generation', 'order_column',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(OrganizationStructure::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(OrganizationStructure::class, 'parent_id')
            ->orderBy('order_column');
    }
}