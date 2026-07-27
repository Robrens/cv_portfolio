<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\SkillCategory;
use App\Models\WorkMethod;
use App\Models\SocialLink;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $profile = Profile::query()
            ->with([
                'stats' => fn($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),

                'passions' => fn($query) => $query
                    ->where('is_active', true)
                    ->orderBy('sort_order'),
            ])
            ->firstOrFail();

        $skillCategories = SkillCategory::query()
            ->where('is_active', true)
            ->with([
                'skills' => fn($query) => $query
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

        return view('index', compact(
            'profile',
            'skillCategories',
            'experiences',
            'workMethods',
            'socialLinks'
        ));
    }
}
