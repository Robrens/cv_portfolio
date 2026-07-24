<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'job_title',
        'hero_eyebrow',
        'hero_title_before',
        'hero_title_primary_highlight',
        'hero_title_middle',
        'hero_title_secondary_highlight',
        'hero_title_after',
        'hero_description',
        'portrait_path',
        'about_eyebrow',
        'about_title',
        'about_description',
        'about_secondary_description',
        'passions_eyebrow',
        'passions_title',
        'passions_subtitle',
        'passions_description',
        'passions_secondary_description',
        'spotify_title',
        'spotify_description',
        'spotify_url',
        'passions_is_active',
        'location',
        'availability',
        'email',
        'resume_path',
        'contact_title',
        'contact_description',
        'contact_button_label',
    ];

    public function stats(): HasMany
    {
        return $this->hasMany(ProfileStat::class)
            ->orderBy('sort_order');
    }

    protected function casts(): array
    {
        return [
            'passions_is_active' => 'boolean',
        ];
    }

    public function passions(): HasMany
    {
        return $this->hasMany(Passion::class)
            ->orderBy('sort_order');
    }
}
