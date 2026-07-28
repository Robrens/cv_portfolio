@props([ 'profile', ])

<section class="section-hero hero-bg rounded-b-button">
  <div class="site-container">
    <div class="grid w-full gap-10 lg:grid-cols-[2.1fr_0.9fr] lg:items-center">
      <div class="order-1">
        @if ($profile->hero_eyebrow)
        <h2 class="text-state-info uppercase">{{ $profile->hero_eyebrow }}</h2>
        @endif

        <h1 class="title mt-4 text-white">
          {{ $profile->hero_title_before }}

          <span class="text-content-third"> {{ $profile->hero_title_primary_highlight }} </span>

          {{ $profile->hero_title_middle }}

          <span class="text-content-primary"> {{ $profile->hero_title_secondary_highlight }} </span>

          {{ $profile->hero_title_after }}
        </h1>

        <p class="subtitle mt-6 max-w-2xl text-content-inverted">
          {{ $profile->hero_description }}
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          @if ($profile->resume_path)
          <a href="{{ asset('storage/' . $profile->resume_path) }}" class="btn btn-primary" download="BAUDU_CV.pdf">
            Télécharger mon CV
          </a>
          @endif

          <a href="#career" class="btn btn-secondary"> Comprendre mon parcours </a>
        </div>
      </div>

      @if ($profile->portrait_path)
      <div class="hero-portrait order-3 lg:order-2">
        <img src="{{ asset('storage/' . $profile->portrait_path) }}"
          alt="Portrait de {{ $profile->first_name }} {{ $profile->last_name }}" width="640" height="800"
          class="w-full object-cover shadow-card" fetchpriority="high" decoding="async" />
      </div>
      @endif

      <ul class="hero-info-list order-2 lg:order-3">
        @if ($profile->location)
        <li class="hero-info-item">
          <x-heroicon-o-map-pin class="hero-info-icon" />

          <div class="hero-info-content">
            <h3 class="hero-info-title">Basé à</h3>
            <p class="hero-info-text">{{ $profile->location }}</p>
          </div>
        </li>
        @endif @if ($profile->opportunity_title || $profile->opportunity_description)
        <li class="hero-info-item">
          <x-heroicon-o-briefcase class="hero-info-icon" aria-hidden="true" />

          <div class="hero-info-content">
            @if ($profile->opportunity_title)
            <h3 class="hero-info-title">{{ $profile->opportunity_title }}</h3>
            @endif @if ($profile->opportunity_description)
            <p class="hero-info-text">{{ $profile->opportunity_description }}</p>
            @endif
          </div>
        </li>
        @endif @if ($profile->training_title || $profile->training_description)
        <li class="hero-info-item">
          <x-heroicon-o-academic-cap class="hero-info-icon" aria-hidden="true" />

          <div class="hero-info-content">
            @if ($profile->training_title)
            <h3 class="hero-info-title">{{ $profile->training_title }}</h3>
            @endif @if ($profile->training_description)
            <p class="hero-info-text">{{ $profile->training_description }}</p>
            @endif
          </div>
        </li>
        @endif @if ($profile->availability)
        <li class="hero-info-item">
          <x-heroicon-o-calendar-days class="hero-info-icon" />

          <div class="hero-info-content">
            <h3 class="hero-info-title">Disponible</h3>
            <p class="hero-info-text">{{ $profile->availability }}</p>
          </div>
        </li>
        @endif
      </ul>
    </div>
  </div>
</section>
