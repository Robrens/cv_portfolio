@props([
'workMethods',
])

@if ($workMethods->isNotEmpty())
<section class="section approach" id="approach">
  <div class="site-container rounded-card bg-brand-primary">
    <div class="mb-5 md:mb-8 lg:mb-12">
      <h2 class="text-content-third uppercase subtitle font-semibold">
        Démarche
      </h2>

      <h1 class="section-title mt-4 text-white">
        Ma façon de travailler
      </h1>
    </div>

    <ul class="flex flex-row flex-wrap">
      @foreach ($workMethods as $workMethod)
      <li class="approach-item">
        <div class="col-span-1 flex flex-col">
          @if ($workMethod->icon)
          <x-dynamic-component :component="'heroicon-o-' . $workMethod->icon" class="h-10 w-10 text-brand-accent" />
          @endif
        </div>

        <div class="col-span-5 flex flex-col gap-1
                    md:gap-2 lg:gap-3">
          <h3 class="text-lg font-bold text-white">
            {{ $workMethod->title }}
          </h3>

          @if ($workMethod->description)
          <p class="text-sm leading-6 text-content-inverted">
            {{ $workMethod->description }}
          </p>
          @endif
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endif
