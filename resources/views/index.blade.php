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
    <x-layouts.header />
    <x-layouts.hero />
    <x-layouts.about />
    <x-layouts.skills />
    <x-layouts.career />
    <x-layouts.approach />
  </body>
</html>
