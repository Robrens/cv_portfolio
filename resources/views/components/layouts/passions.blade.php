<section class="section passions mt-10" id="passions">
  <div class="site-container rounded-card bg-brand-primary">
    <div class="lg:flex gap-8 lg:flex-row lg:justify-between">
      <div class="mb-5 lg:mb-12 lg:w-[45%]">
        <h2 class="text-content-third uppercase subtitle font-semibold">
          Passions & moi
        </h2>

        <h1 class="section-title mt-4 text-white">
          Au-delà du code
        </h1>

        <h3 class="mt-2 text-[1.10rem] text-muted md:text-[1.25rem]">
          Ce qui nourrit ma curiosité
        </h3>

        <p class="mt-8 text-muted">
          La technique occupe une bonne partie de mon quotidien, mais je garde aussi
          une vraie place pour la musique, la science-fiction, la fantasy, les jeux
          vidéo et les jeux de rôle.
        </p>

        <p class="mt-4 text-muted">
          Ces univers m’intéressent pour les mêmes raisons que le développement :
          construire des systèmes cohérents, comprendre des mécaniques, explorer des
          idées et partager des expériences avec d’autres.
        </p>
      </div>

      <div class="flex flex-col items-center justify-center lg:w-[45%]">
        <div x-data="spotifyEmbed({
            url: 'https://open.spotify.com/playlist/{{ config('services.spotify.playlist_id') }}',
            externalUrl: 'https://open.spotify.com/playlist/{{ config('services.spotify.playlist_id') }}',
            height: 352})" class="w-full rounded-card border border-white/10 bg-white/3 p-6 md:p-8 mb-10">
          <div x-show="!consentGiven" x-cloak>
            <div class="flex items-start gap-4">
              <div
                class="flex size-11 shrink-0 items-center justify-center rounded-button bg-state-success/10 text-state-success">
                <x-heroicon-o-musical-note class="size-6" />
              </div>

              <div>
                <h3 class="text-lg font-semibold text-white">
                  Ma playlist Spotify
                </h3>

                <p class="mt-2 text-sm leading-6 text-muted">
                  Du metal, quelques classiques et quelques découvertes.
                </p>
              </div>
            </div>

            <div class="mt-6 rounded-card border border-white/10 bg-brand-secondary/30 p-5">
              <p class="text-sm leading-6 text-muted">
                Spotify est un service externe. Pour éviter de charger ses scripts sans consentement,
                la playlist n’est intégrée qu’après votre action.
              </p>

              <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                <button type="button" class="btn btn-primary" @click="load" :disabled="loading">
                  <span x-show="!loading">Afficher la playlist</span>
                  <span x-show="loading">Chargement…</span>
                </button>

                <a :href="externalUrl" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                  Ouvrir Spotify
                </a>
              </div>

              <p x-show="error" x-cloak class="mt-4 text-sm text-state-error" x-text="error"></p>
            </div>
          </div>

          <div x-show="consentGiven" x-cloak>
            <div class="mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
              <div>
                <h3 class="text-lg font-semibold text-white">
                  Ma playlist Spotify
                </h3>

                <p class="mt-1 text-sm text-muted">
                  <span x-show="loading">Chargement du lecteur Spotify…</span>
                  <span x-show="ready">Chargée après consentement.</span>
                </p>
              </div>

              <a :href="externalUrl" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                Ouvrir Spotify
              </a>
            </div>

            <div x-ref="embed"
              class="spotify-embed-container min-h-88 overflow-hidden rounded-card bg-brand-secondary/30">
            </div>

            <p x-show="error" x-cloak class="mt-4 text-sm text-state-error" x-text="error"></p>
          </div>
        </div>
      </div>
    </div>
    <div>
      <ul class="flex flex-row gap-8 w-full">
        <li class="rounded-card border border-white/10 bg-white/3 p-6 md:p-8 lg:w-[24%]">Metal</li>
        <li class="rounded-card border border-white/10 bg-white/3 p-6 md:p-8 lg:w-[24%]">Metal</li>
        <li class="rounded-card border border-white/10 bg-white/3 p-6 md:p-8 lg:w-[24%]">Metal</li>
        <li class="rounded-card border border-white/10 bg-white/3 p-6 md:p-8 lg:w-[24%]">Metal</li>
      </ul>
    </div>
  </div>
</section>
