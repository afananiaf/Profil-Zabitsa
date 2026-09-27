<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $fillable = [
        'name', 'slug', 'short_name', 'icon', 'description', 'duration', 'overview',
        'objectives', 'curriculum', 'programs', 'activities', 'info', 'order_column',
    ];
}