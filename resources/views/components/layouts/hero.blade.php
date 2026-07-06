<section class="section-hero hero-bg">
  <div class="site-container">
    <div class="w-full grid gap-10 lg:grid-cols-[2.1fr_0.9fr] lg:items-center">
      <div class="order-1">
        <h2 class="text-state-info uppercase">
          Développeur Applicatif & Systèmes
        </h2>

        <h1 class="title mt-4 text-white">
          Je construis des applications
          <span class="text-content-third">utiles</span>
          et des infrastructures
          <span class="text-content-primary">fiables</span>
        </h1>

        <p class="subtitle mt-6 max-w-2xl text-content-inverted">
          Développeur Laravel / PHP avec une culture systèmes, réseaux et automatisation.
          Je conçois, déploie des solutions robustes, maintenables et sécurisées.
        </p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="/cv.pdf" class="btn btn-primary">
            Télécharger mon CV
          </a>

          <a href="#parcours" class="btn btn-secondary">
            Comprendre mon parcours
          </a>
        </div>
      </div>

      <div class="order-3 lg:order-2 hero-portrait">
        <img src="{{ asset('storage/hero/profil-picture.png') }}"
            alt="Portrait de Jean-Baptiste Baudu"
          class="w-full object-cover shadow-card">
      </div>

      <ul class="hero-info-list order-2 lg:order-3">
        <li class="hero-info-item">
          <x-heroicon-o-map-pin class="hero-info-icon" />
          <div class="hero-info-content">
            <h3 class="hero-info-title">Basé à</h3>
            <p class="hero-info-text">Ploërmel · Rennes · Vannes</p>
          </div>
        </li>

        <li class="hero-info-item">
          <x-heroicon-o-briefcase class="hero-info-icon" />
          <div class="hero-info-content">
            <h3 class="hero-info-title">Opportunités</h3>
            <p class="hero-info-text">Alternance ou projet applicatif</p>
          </div>
        </li>

        <li class="hero-info-item">
          <x-heroicon-o-academic-cap class="hero-info-icon" />
          <div class="hero-info-content">
            <h3 class="hero-info-title">Alternance Bac+5</h3>
            <p class="hero-info-text">Architecture & développement logiciel</p>
          </div>
        </li>

        <li class="hero-info-item">
          <x-heroicon-o-calendar-days class="hero-info-icon" />
          <div class="hero-info-content">
            <h3 class="hero-info-title">Disponible</h3>
            <p class="hero-info-text">Dès septembre 2026</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
