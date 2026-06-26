<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/scss/app.scss', 'resources/js/app.ts']) @endif
  </head>
  <body>
    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
  </body>
</html>
