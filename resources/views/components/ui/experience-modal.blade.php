@props([
'experience',
])

@php
$modalId = 'experience-' . $experience->id;
$titleId = $modalId . '-title';
@endphp

<dialog id="{{ $modalId }}" class="experience-modal" aria-labelledby="{{ $titleId }}"
  x-data="experienceModal(@js($modalId))" x-on:open-experience-modal.window="
        if ($event.detail.id === modalId) {
            open();
        }
    " x-on:click="closeOnBackdrop($event)">
  <div class="experience-modal__panel">
    <header class="experience-modal__header">
      <div>
        <p class="experience-modal__period">
          {{ $experience->period_label }}

          @if ($experience->employment_type)
          · {{ $experience->employment_type }}
          @endif
        </p>

        <h2 id="{{ $titleId }}" class="experience-modal__title">
          {{ $experience->job_title }}
        </h2>

        <p class="experience-modal__company">
          {{ $experience->company_name }}

          @if ($experience->location)
          · {{ $experience->location }}
          @endif
        </p>
      </div>

      <button type="button" class="experience-modal__close" aria-label="Fermer la fenêtre" x-on:click="close()">
        <x-heroicon-o-x-mark aria-hidden="true" />
      </button>
    </header>

    <div class="experience-modal__content">
      @if ($experience->details)
      <p class="experience-modal__description">
        {{ $experience->details }}
      </p>
      @endif

      @if (! empty($experience->responsibilities))
      <section class="experience-modal__section">
        <h3>Missions et responsabilités</h3>

        <ul>
          @foreach ($experience->responsibilities as $responsibility)
          <li>{{ $responsibility }}</li>
          @endforeach
        </ul>
      </section>
      @endif

      @if (! empty($experience->achievements))
      <section class="experience-modal__section">
        <h3>Réalisations</h3>

        <ul>
          @foreach ($experience->achievements as $achievement)
          <li>{{ $achievement }}</li>
          @endforeach
        </ul>
      </section>
      @endif

      @if (! empty($experience->technologies))
      <section class="experience-modal__section">
        <h3>Technologies utilisées</h3>

        <div class="experience-modal__tags">
          @foreach ($experience->technologies as $technology)
          <x-ui.badge :label="$technology" />
          @endforeach
        </div>
      </section>
      @endif
    </div>

    <footer class="experience-modal__footer">
      @if ($experience->company_url)
      <a href="{{ $experience->company_url }}" class="btn btn-secondary" target="_blank"
        rel="noopener noreferrer">
        <span>Voir le site de l’entreprise</span>
        <x-heroicon-o-arrow-top-right-on-square aria-hidden="true" />
      </a>
      @endif

      <button type="button" class="btn btn-primary" x-on:click="close()">
        Fermer
      </button>
    </footer>
  </div>
</dialog>
