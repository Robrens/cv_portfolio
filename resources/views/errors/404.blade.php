<!DOCTYPE html>
<html lang="fr">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Page introuvable — {{ config('app.name') }}</title>
    <meta name="robots" content="noindex, nofollow" />

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.ts'])
    @endif
  </head>

  <body>
    <main class="bg-brand-primary">
      <div class="h-screen! w-full flex flex-col justify-center items-center py-20 gap-10">
        <p class="text-state-error text-[4rem] lg:text-[6rem] text-center">Erreur 404</p>
        <h1 class="text-state-error text-[2rem] lg:text-[4rem] text-center">Page introuvable</h1>

        <p class="text-content-primary text-[1.5rem] lg:text-[2rem] text-center">
          La page demandée n’existe pas ou a été déplacée.
        </p>

        <a href="{{ route('home') }}" class="text-content-inverted hover:text-muted">
          Revenir à l’accueil
        </a>
      </div>
    </main>
  </body>

</html>
