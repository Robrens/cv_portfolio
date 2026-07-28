<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /dashboard',
            '',
            'Sitemap: '.route('seo.sitemap'),
        ]);

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function sitemap(): Response
    {
        $homeUrl = htmlspecialchars(
            route('home'),
            ENT_XML1 | ENT_QUOTES,
            'UTF-8',
        );

        $content = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            <url>
                <loc>{$homeUrl}</loc>
            </url>
        </urlset>
        XML;

        return response($content, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
