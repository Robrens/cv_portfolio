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
  <body>
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

    <x-layouts.footer :profile="$profile" />
  </body>
</html>
