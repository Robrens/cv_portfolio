<header x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)"
  @keydown.escape.window="open = false" class="header">
  <div class="site-container">
    <div class="flex items-center justify-between lg:justify-start lg:gap-10">
      <div class="lg:w-[20%]">
        <a href="/" class="title text-brand-accent">JB</a>
      </div>

      <nav class="hidden lg:flex items-center gap-10 lg:w-[75%]" aria-label="desktop navigation">
        <a href="/" class="nav-link is-active">Accueil</a>
        <a href="#parcours" class="nav-link">Parcours</a>
        <a href="#competences" class="nav-link">Compétences</a>
        <a href="#projets" class="nav-link">Projets</a>
        <a href="#contact" class="nav-link">Contact</a>
      </nav>

      <button type="button" class="burger-btn" @click="open = true" :aria-expanded="open.toString()"
        aria-controls="mobile-menu" aria-label="Ouvrir le menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>

  <div x-show="open" x-transition.opacity.duration.200ms class="mobile-overlay lg:hidden" @click="open = false" x-cloak>
  </div>

  <aside id="mobile-menu" x-show="open" x-transition:enter="transition-transform duration-300 ease-soft"
    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition-transform duration-200 ease-in" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full" class="mobile-menu lg:hidden" x-cloak>
    <button type="button" class="mobile-menu-close" @click="open = false" aria-label="Fermer le menu">
      ×
    </button>

    <nav class="mobile-nav" aria-label="mobile navigation">
      <a href="/" class="mobile-nav-link is-active" @click="open = false">Accueil</a>
      <a href="#parcours" class="mobile-nav-link" @click="open = false">Parcours</a>
      <a href="#competences" class="mobile-nav-link" @click="open = false">Compétences</a>
      <a href="#projets" class="mobile-nav-link" @click="open = false">Projets</a>
      <a href="#contact" class="mobile-nav-link" @click="open = false">Contact</a>
    </nav>
  </aside>
</header>
