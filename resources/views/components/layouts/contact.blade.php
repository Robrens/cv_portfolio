@props([
'profile',
])

@if (
filled($profile->contact_title)
|| filled($profile->contact_description)
|| filled($profile->contact_button_label)
|| filled($profile->email)
)
<section class="section contact-cta-section" id="contact">
  <div class="site-container">
    <div class="contact-cta">
      <div class="contact-cta__content">
        <div class="contact-cta__icon" aria-hidden="true">
          <x-heroicon-s-paper-airplane />
        </div>

        <div>
          @if ($profile->contact_title)
          <h2 class="contact-cta__title">
            {{ $profile->contact_title }}
          </h2>
          @endif

          @if ($profile->contact_description)
          <p class="contact-cta__text">
            {{ $profile->contact_description }}
          </p>
          @endif
        </div>
      </div>

      @if ($profile->email)
      <a href="mailto:{{ $profile->email }}" class="contact-cta__button">
        {{ $profile->contact_button_label ?: 'Me contacter' }}

        <x-heroicon-s-arrow-right class="contact-cta__button-icon" aria-hidden="true" />
      </a>
      @endif
    </div>
  </div>
</section>
@endif
