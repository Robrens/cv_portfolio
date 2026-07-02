@props([
'icon' => null,
'title' => null,
'subtitle' => null,
'description' => null,
])

<div class="card">
  @if ($icon)
  <div>
    <x-dynamic-component :component="'heroicon-o-' . $icon" class="card-icon" />
  </div>
  @endif

  <div class="mt-4 gap-y-2">
    <h3 class="eyebrow">{{ $title }}</h3>
    <p>{{ $subtitle }}</p>
  </div>

  <div class="mt-4">
    <p>{{ $description }}</p>
  </div>
</div>
