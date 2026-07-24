<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CV Baudu Jean-Baptiste</title>
    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.ts']) @endif
  </head>

  <body id="top">
    <x-layouts.header :profile="$profile" :skill-categories="$skillCategories" :experiences="$experiences"
      :work-methods="$workMethods" />

    <main>
      <x-layouts.hero :profile="$profile" />
      <x-layouts.about :profile="$profile" />
      <x-layouts.skills :skill-categories="$skillCategories" />
      <x-layouts.career :experiences="$experiences" />
      <x-layouts.approach :work-methods="$workMethods" />

      @if ($profile->passions_is_active)
      <x-layouts.passions :profile="$profile" />
      @endif

      <x-layouts.contact :profile="$profile" />
    </main>

    <x-layouts.footer :profile="$profile" :skill-categories="$skillCategories" :experiences="$experiences"
      :work-methods="$workMethods" :social-links="$socialLinks" />

    <a href="#top" class="back-to-top" aria-label="Retour en haut de page" x-data="{ visible: window.scrollY > 200 }"
      x-show="visible" @scroll.window="visible = window.scrollY > 200"
      x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2"
      x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" x-cloak>
      <x-heroicon-o-arrow-up aria-hidden="true" />
    </a>
  </body>

</html>
