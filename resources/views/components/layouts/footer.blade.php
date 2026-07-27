@props([
'profile',
'skillCategories',
'experiences',
'workMethods',
'socialLinks',
])

@php
$hasAbout = filled($profile->about_title)
|| filled($profile->about_description)
|| $profile->stats->isNotEmpty();

$hasContact = filled($profile->contact_title)
|| filled($profile->contact_description)
|| filled($profile->email);

$initials = mb_strtoupper(
mb_substr($profile->first_name ?? '', 0, 1)
. mb_substr($profile->last_name ?? '', 0, 1)
);

$fullName = trim(
($profile->first_name ?? '')
. ' '
. ($profile->last_name ?? '')
);
@endphp

<footer class="footer">
  <div class="site-container">
    <div class="footer__inner">
      <div class="footer__brand">
        <a href="#top" class="footer__logo" title="Retour en haut de page">
          {{ $initials }}
        </a>

        @if ($profile->job_title)
        <p class="footer__job">
          {{ $profile->job_title }}
        </p>
        @endif
      </div>

      <nav class="footer__block" aria-label="Navigation secondaire">
        <h2 class="footer__title">
          Navigation
        </h2>

        <ul class="footer__list">
          <li>
            <a href="#top">Accueil</a>
          </li>

          @if ($hasAbout)
          <li>
            <a href="#about">À propos</a>
          </li>
          @endif

          @if ($skillCategories->isNotEmpty())
          <li>
            <a href="#skills">Compétences</a>
          </li>
          @endif

          @if ($experiences->isNotEmpty())
          <li>
            <a href="#career">Parcours</a>
          </li>
          @endif

          @if ($workMethods->isNotEmpty())
          <li>
            <a href="#approach">Démarche</a>
          </li>
          @endif

          @if ($profile->passions_is_active)
          <li>
            <a href="#passions">Passions</a>
          </li>
          @endif

          @if ($hasContact)
          <li>
            <a href="#contact">Contact</a>
          </li>
          @endif
        </ul>
      </nav>

      @if ($socialLinks->isNotEmpty() || $profile->email)
      <div class="footer__block">
        <h2 class="footer__title">
          Me suivre
        </h2>

        <ul class="footer__list">
          @foreach ($socialLinks as $socialLink)
          <li>
            <a href="{{ $socialLink->url }}" target="_blank" rel="noopener noreferrer">
              <x-icons.icon :name="$socialLink->icon" class="footer__icon" aria-hidden="true" />

              <span>{{ $socialLink->name }}</span>
            </a>
          </li>
          @endforeach

          @if ($profile->email)
          <li>
            <a href="mailto:{{ $profile->email }}">
              <x-icons.icon name="envelope" class="footer__icon" aria-hidden="true" />
              Email
            </a>
          </li>
          @endif
        </ul>
      </div>
      @endif

      @if ($profile->location || $profile->availability)
      <div class="footer__block footer__infos">
        <h2 class="footer__title">
          Informations
        </h2>

        <ul class="footer__list">
          @if ($profile->location)
          <li>
            {{ $profile->location }}
          </li>
          @endif

          @if ($profile->availability)
          <li>
            {{ $profile->availability }}
          </li>
          @endif
        </ul>
      </div>
      @endif
    </div>

    <div class="footer__bottom">
      <p class="footer__copyright">
        © {{ date('Y') }}

        @if ($fullName)
        {{ $fullName }} —
        @endif

        Tous droits réservés.
      </p>
    </div>
  </div>
</footer>
