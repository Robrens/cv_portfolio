<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'employment_type',
        'location',
        'company_url',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
        'is_current',
        'summary',
        'details',
        'responsibilities',
        'achievements',
        'technologies',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_year' => 'integer',
            'start_month' => 'integer',
            'end_year' => 'integer',
            'end_month' => 'integer',
            'is_current' => 'boolean',
            'responsibilities' => 'array',
            'achievements' => 'array',
            'technologies' => 'array',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
