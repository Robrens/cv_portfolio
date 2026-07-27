@props([
'profile',
])

<section class="section about" id="about">
  <div class="site-container">
    <div>
      @if ($profile->about_eyebrow)
      <h2 class="text-content-third uppercase subtitle font-semibold">
        {{ $profile->about_eyebrow }}
      </h2>
      @endif

      @if ($profile->about_title)
      <h1 class="section-title mt-4 text-heading">
        {{ $profile->about_title }}
      </h1>
      @endif
    </div>

    <div class="mt-6 grid grid-cols-1 gap-8 md:grid-cols-5">
      <div class="col-span-1 md:col-span-2">
        @if ($profile->about_description)
        <p class="mt-6 text-heading">
          {{ $profile->about_description }}
        </p>
        @endif

        @if ($profile->about_secondary_description)
        <p class="mt-4 text-heading">
          {{ $profile->about_secondary_description }}
        </p>
        @endif
      </div>

      @if ($profile->stats->isNotEmpty())
      <div class="col-span-1 grid grid-cols-1 gap-4
                sm:grid-cols-2 md:col-span-3 lg:grid-cols-4">
        @foreach ($profile->stats as $stat)
        <x-ui.card :icon="$stat->icon" :title="$stat->value" :subtitle="$stat->unit" :description="$stat->label" />
        @endforeach
      </div>
      @endif
    </div>
  </div>
</section>
