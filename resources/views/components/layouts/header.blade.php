@props([
'profile',
'skillCategories',
'experiences',
'workMethods',
])

@php
$hasAbout = filled($profile->about_title)
|| filled($profile->about_description)
|| $profile->stats->isNotEmpty();

$hasContact = filled($profile->contact_title)
|| filled($profile->contact_description)
|| filled($profile->email);

$initials = mb_strtoupper(
mb_substr($profile->first_name, 0, 1)
. mb_substr($profile->last_name, 0, 1)
);

$resumeUrl = $profile->resume_path
? asset('storage/' . $profile->resume_path)
: null;
@endphp

<header x-data="{
    open: false,
    activeSection: null,

    init() {
      const updateActiveSection = () => {
        const headerOffset = this.$root.offsetHeight + 24;

        const sectionIds = [
          'about',
          'skills',
          'career',
          'approach',
          'passions',
          'contact',
        ];

        let currentSection = null;

        for (const sectionId of sectionIds) {
          const section = document.getElementById(sectionId);

          if (! section) {
            continue;
          }

          if (section.getBoundingClientRect().top <= headerOffset) {
            currentSection = sectionId;
          }
        }

        this.activeSection = currentSection;
      };

      updateActiveSection();

      window.addEventListener('scroll', updateActiveSection, {
        passive: true,
      });

      window.addEventListener('resize', updateActiveSection);
    },
  }" x-effect="document.body.classList.toggle('overflow-hidden', open)" @keydown.escape.window="open = false"
  class="header">

  <div class="site-header-container">
    <div class="flex items-center justify-between gap-10">
      <a href="/" class="flex shrink-0 items-center gap-3">
        <span class="title text-brand-accent">
          {{ $initials }}
        </span>
      </a>

      <nav class="hidden flex-1 items-center justify-center gap-8 lg:flex" aria-label="Navigation principale">

        @if ($hasAbout)
        <a href="#about" class="nav-link" :class="{ 'is-active': activeSection === 'about' }"
          @click="activeSection = 'about'">
          À propos
        </a>
        @endif

        @if ($skillCategories->isNotEmpty())
        <a href="#skills" class="nav-link" :class="{ 'is-active': activeSection === 'skills' }"
          @click="activeSection = 'skills'">
          Compétences
        </a>
        @endif

        @if ($experiences->isNotEmpty())
        <a href="#career" class="nav-link" :class="{ 'is-active': activeSection === 'career' }"
          @click="activeSection = 'career'">
          Parcours
        </a>
        @endif

        @if ($workMethods->isNotEmpty())
        <a href="#approach" class="nav-link" :class="{ 'is-active': activeSection === 'approach' }"
          @click="activeSection = 'approach'">
          Démarche
        </a>
        @endif

        @if ($profile->passions_is_active)
        <a href="#passions" class="nav-link" :class="{ 'is-active': activeSection === 'passions' }"
          @click="activeSection = 'passions'">
          Passions
        </a>
        @endif

        @if ($hasContact)
        <a href="#contact" class="nav-link" :class="{ 'is-active': activeSection === 'contact' }"
          @click="activeSection = 'contact'">
          Contact
        </a>
        @endif
      </nav>

      @if ($resumeUrl)
      <a href="{{ $resumeUrl }}" class="btn btn-primary hidden shrink-0 lg:inline-flex" download>
        Télécharger mon CV

        <x-heroicon-o-arrow-down-tray class="size-5" aria-hidden="true" />
      </a>
      @endif

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

    <nav class="mobile-nav" aria-label="Navigation mobile">
      <a href="/" class="mobile-nav-link" :class="{ 'is-active': activeSection === null }" @click="open = false">
        Accueil
      </a>

      @if ($hasAbout)
      <a href="#about" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'about' }"
        @click="activeSection = 'about'; open = false">
        À propos
      </a>
      @endif

      @if ($skillCategories->isNotEmpty())
      <a href="#skills" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'skills' }"
        @click="activeSection = 'skills'; open = false">
        Compétences
      </a>
      @endif

      @if ($experiences->isNotEmpty())
      <a href="#career" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'career' }"
        @click="activeSection = 'career'; open = false">
        Parcours
      </a>
      @endif

      @if ($workMethods->isNotEmpty())
      <a href="#approach" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'approach' }"
        @click="activeSection = 'approach'; open = false">
        Démarche
      </a>
      @endif

      @if ($profile->passions_is_active)
      <a href="#passions" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'passions' }"
        @click="activeSection = 'passions'; open = false">
        Passions
      </a>
      @endif

      @if ($hasContact)
      <a href="#contact" class="mobile-nav-link" :class="{ 'is-active': activeSection === 'contact' }"
        @click="activeSection = 'contact'; open = false">
        Contact
      </a>
      @endif
    </nav>

    @if ($resumeUrl)
    <a href="{{ $resumeUrl }}" class="btn btn-primary mt-8" download>
      Télécharger mon CV

      <x-heroicon-o-arrow-down-tray class="size-5" aria-hidden="true" />
    </a>
    @endif
  </aside>
</header>