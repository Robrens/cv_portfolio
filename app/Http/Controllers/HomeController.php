<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\SeoSetting;
use App\Models\SkillCategory;
use App\Models\SocialLink;
use App\Models\WorkMethod;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $profile = Profile::query()
            ->with([
                'stats' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),

                'passions' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),
            ])
            ->firstOrFail();

        $skillCategories = SkillCategory::query()
            ->where('is_active', true)
            ->with([
                'skills' => fn ($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),
            ])
            ->orderBy('sort_order')
            ->get();

        $experiences = Experience::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $workMethods = WorkMethod::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $socialLinks = SocialLink::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $seoSetting = SeoSetting::query()->first();
        $seoTitle = $seoSetting?->title
            ?: "{$profile->first_name} {$profile->last_name} — {$profile->job_title}";

        $seoDescription = $seoSetting?->description
            ?: $profile->hero_description;

        $ogImageUrl = filled($seoSetting?->og_image)
            ? asset('storage/'.ltrim($seoSetting->og_image, '/'))
            : route('seo.og-image');

        return view('index', compact(
            'profile',
            'skillCategories',
            'experiences',
            'workMethods',
            'socialLinks',
            'seoTitle',
            'seoDescription',
            'ogImageUrl',
        ));
    }
}
