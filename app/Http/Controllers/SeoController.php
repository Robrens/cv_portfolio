<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\JpegEncoder;
use RuntimeException;

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

    public function openGraphImage(): Response
    {
        $profile = Profile::query()->firstOrFail();

        $generatorVersion = '2';

        $cacheKey = sha1(implode('|', [
            $generatorVersion,
            $profile->updated_at?->timestamp,
            $profile->first_name,
            $profile->last_name,
            $profile->job_title,
            $profile->hero_eyebrow,
            $profile->hero_title_before,
            $profile->hero_title_primary_highlight,
            $profile->hero_title_middle,
            $profile->hero_title_secondary_highlight,
            $profile->hero_title_after,
            $profile->portrait_path,
        ]));

        $generatedPath = "open-graph/generated/hero-{$cacheKey}.jpg";
        $disk = Storage::disk('public');

        if (! $disk->exists($generatedPath)) {
            $this->generateOpenGraphImage($profile, $generatedPath);
        }

        return response($disk->get($generatedPath), 200, [
            'Content-Type' => 'image/jpeg',
            'Cache-Control' => 'public, max-age=86400',
            'X-Robots-Tag' => 'noindex, noimageindex',
        ]);
    }

    private function generateOpenGraphImage(
        Profile $profile,
        string $generatedPath,
    ): void {
        $regularFont = resource_path('fonts/Inter-Regular.ttf');
        $boldFont = resource_path('fonts/Inter-Bold.ttf');

        if (! is_file($regularFont) || ! is_file($boldFont)) {
            throw new RuntimeException(
                "Les polices nécessaires à l'image Open Graph sont absentes.",
            );
        }

        $image = Image::createImage(1200, 630)->fill('#0a182b');

        $eyebrow = mb_strtoupper($profile->hero_eyebrow ?? '');

        $title = trim(implode(' ', array_filter([
            $profile->hero_title_before,
            $profile->hero_title_primary_highlight,
            $profile->hero_title_middle,
            $profile->hero_title_secondary_highlight,
            $profile->hero_title_after,
        ])));

        $image->text(
            $eyebrow,
            70,
            75,
            function ($font) use ($boldFont): void {
                $font->filename($boldFont);
                $font->size(20);
                $font->color('#2563eb');
            },
        );

        $image->text(
            wordwrap($title, 28),
            70,
            145,
            function ($font) use ($boldFont): void {
                $font->filename($boldFont);
                $font->size(52);
                $font->color('#f8fafc');
                $font->lineHeight(1.25);
            },
        );

        $image->text(
            $profile->job_title ?? '',
            70,
            505,
            function ($font) use ($regularFont): void {
                $font->filename($regularFont);
                $font->size(24);
                $font->color('#cbd5e1');
            },
        );

        $image->text(
            trim("{$profile->first_name} {$profile->last_name}"),
            70,
            555,
            function ($font) use ($boldFont): void {
                $font->filename($boldFont);
                $font->size(22);
                $font->color('#ef4444');
            },
        );

        $portraitPath = $profile->portrait_path;

        if (
            filled($portraitPath)
            && Storage::disk('public')->exists($portraitPath)
        ) {
            $portrait = Image::decodeBinary(
                Storage::disk('public')->get($portraitPath),
            );

            $portrait->cover(430, 580);

            $image->insert(
                image: $portrait,
                x: 0,
                y: 0,
                alignment: 'bottom-right',
            );
        }

        $encodedImage = $image->encode(
            new JpegEncoder(quality: 90),
        );

        $written = Storage::disk('public')->put(
            $generatedPath,
            $encodedImage->toString(),
        );

        if (! $written) {
            throw new RuntimeException(
                "Impossible d'écrire l'image Open Graph.",
            );
        }
    }
}
