@props([
'period',
'meta' => null,
'title',
'description',
'tags' => [],
'href' => null,
])

<div class="career-item">
  <div class="career-date">
    <span class="career-dot" aria-hidden="true"></span>

    <p class="text-sm font-bold uppercase leading-6 text-content-secondary">
      {{ $period }}
    </p>

    @if($meta)
    <p class="mt-1 text-sm text-content-secondary">
      {{ $meta }}
    </p>
    @endif
  </div>

  <article class="career-card">
    <div>
      <h3 class="text-lg font-bold text-heading">
        {{ $title }}
      </h3>

      <p class="mt-3 leading-7 text-content-secondary">
        {{ $description }}
      </p>

      @if(count($tags))
      <div class="mt-5 flex flex-wrap gap-2">
        @foreach($tags as $tag)
        <x-ui.badge :label="$tag" />
        @endforeach
      </div>
      @endif
    </div>

    @if($href)
    <a href="{{ $href }}" class="career-link">
      <span>Voir le détail</span>
      <x-heroicon-o-arrow-right class="h-4 w-4" aria-hidden="true" />
    </a>
    @endif
  </article>
</div>
