<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @if (request()->routeIs('home'))
    <title>{{ $seoTitle }}</title>

    <meta name="description" content="{{ $seoDescription }}" />

    <link rel="canonical" href="{{ route('home') }}" />

    <meta property="og:title" content="{{ $seoTitle }}" />

    <meta property="og:description" content="{{ $seoDescription }}" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:site_name" content="{{ $profile->first_name }} {{ $profile->last_name }}" />
    @elseif (request()->routeIs('legal.mentions'))
    <title>Mentions légales — {{ $profile->first_name }} {{ $profile->last_name }}</title>
    <meta name="robots" content="noindex, follow" />
    @elseif (request()->routeIs('legal.privacy'))
    <title>
      Politique de confidentialité — {{ $profile->first_name }} {{ $profile->last_name }}
    </title>
    <meta name="robots" content="noindex, follow" />
    @endif @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.ts']) @endif
  </head>

  <body id="top">
    <x-layouts.header
      :profile="$profile"
      :skill-categories="$skillCategories"
      :experiences="$experiences"
      :work-methods="$workMethods"
    />

    <main>
      @if(request()->routeIs('home'))
      <x-layouts.hero :profile="$profile" />
      <x-layouts.about :profile="$profile" />
      <x-layouts.skills :profile="$profile" :skill-categories="$skillCategories" />

      <x-layouts.career :profile="$profile" :experiences="$experiences" />

      <x-layouts.approach :profile="$profile" :work-methods="$workMethods" />

      @if ($profile->passions_is_active)
      <x-layouts.passions :profile="$profile" />
      @endif
      <x-layouts.contact :profile="$profile" />

      @elseif(request()->routeIs('legal.mentions'))
      <x-legal.legal-notices />
      @elseif(request()->routeIs('legal.privacy'))
      <x-legal.privacy-policy />
      @else oups @endif
    </main>

    <x-layouts.footer
      :profile="$profile"
      :skill-categories="$skillCategories"
      :experiences="$experiences"
      :work-methods="$workMethods"
      :social-links="$socialLinks"
    />

    <a
      href="#top"
      class="back-to-top"
      aria-label="Retour en haut de page"
      x-data="{ visible: window.scrollY > 200 }"
      x-show="visible"
      @scroll.window="visible = window.scrollY > 200"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-2"
      x-cloak
    >
      <x-heroicon-o-arrow-up aria-hidden="true" />
    </a>
  </body>
</html>
