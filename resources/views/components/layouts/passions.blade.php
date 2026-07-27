@props([
'profile',
])

<section class="section passions" id="passions">
  <div class="site-container rounded-card bg-brand-primary">
    <div class="gap-8 lg:flex lg:flex-row lg:justify-between">
      <div @class([ 'mb-5 lg:mb-12' , 'lg:w-[45%]'=> filled($profile->spotify_url),
        ])
        >
        @if ($profile->passions_eyebrow)
        <h2 class="text-content-third uppercase subtitle font-semibold">
          {{ $profile->passions_eyebrow }}
        </h2>
        @endif

        @if ($profile->passions_title)
        <h1 class="section-title mt-4 text-white">
          {{ $profile->passions_title }}
        </h1>
        @endif

        @if ($profile->passions_subtitle)
        <h3 class="mt-2 text-[1.10rem] text-muted md:text-[1.25rem]">
          {{ $profile->passions_subtitle }}
        </h3>
        @endif

        @if ($profile->passions_description)
        <p class="mt-8 text-muted">
          {{ $profile->passions_description }}
        </p>
        @endif

        @if ($profile->passions_secondary_description)
        <p class="mt-4 text-muted">
          {{ $profile->passions_secondary_description }}
        </p>
        @endif
      </div>

      @if ($profile->spotify_url)
      <div class="flex flex-col items-center justify-center lg:w-[45%]" x-data="spotifyEmbed({
            url: @js($profile->spotify_url),
            externalUrl: @js($profile->spotify_url),
            height: 352,
          })">
        <div class="mb-10 w-full rounded-card border border-white/10 bg-white/3 p-6 md:p-8">
          <div x-show="!consentGiven" x-cloak>
            <div class="flex items-start gap-4">
              <div class="flex size-11 shrink-0 items-center justify-center rounded-button bg-state-success/10 text-state-success">
                <x-heroicon-o-musical-note class="size-6" />
              </div>

              <div>
                <h3 class="text-lg font-semibold text-white">
                  {{ $profile->spotify_title }}
                </h3>

                @if ($profile->spotify_description)
                <p class="mt-2 text-sm leading-6 text-muted">
                  {{ $profile->spotify_description }}
                </p>
                @endif
              </div>
            </div>

            <div class="mt-6 rounded-card border border-white/10 bg-brand-secondary/30 p-5">
              <p class="text-sm leading-6 text-muted">
                Spotify est un service externe. Pour éviter de charger ses
                scripts sans consentement, la playlist n’est intégrée
                qu’après votre action.
              </p>

              <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                <button type="button" class="btn btn-primary" @click="load" :disabled="loading">
                  <span x-show="!loading">
                    Afficher la playlist
                  </span>

                  <span x-show="loading">
                    Chargement…
                  </span>
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
                  {{ $profile->spotify_title }}
                </h3>

                <p class="mt-1 text-sm text-muted">
                  <span x-show="loading">
                    Chargement du lecteur Spotify…
                  </span>

                  <span x-show="ready">
                    Chargée après consentement.
                  </span>
                </p>
              </div>

              <a :href="externalUrl" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                Ouvrir Spotify
              </a>
            </div>

            <div x-ref="embed" class="spotify-embed-container min-h-88 overflow-hidden rounded-card bg-brand-secondary/30"></div>

            <p x-show="error" x-cloak class="mt-4 text-sm text-state-error" x-text="error"></p>
          </div>
        </div>
      </div>
      @endif
    </div>

    @if ($profile->passions->isNotEmpty())
    <ul class="grid w-full grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 lg:gap-8">
      @foreach ($profile->passions as $passion)
      <li class="rounded-card border border-white/10 bg-white/3 p-6 md:p-8">
        <div class="flex flex-row items-center justify-start gap-2">
          @if ($passion->icon)
          <x-dynamic-component :component="'heroicon-o-' . $passion->icon" class="size-12 text-brand-accent" />
          @endif

          <h3 class="mt-2 text-md font-semibold text-white">
            {{ $passion->title }}
          </h3>
        </div>

        @if ($passion->description)
        <p class="mt-1 text-sm text-muted md:mt-2 lg:mt-3">
          {{ $passion->description }}
        </p>
        @endif
      </li>
      @endforeach
    </ul>
    @endif
  </div>
</section>
