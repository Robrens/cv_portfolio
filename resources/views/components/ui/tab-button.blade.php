@props([ 'key', 'label', 'icon' => null, ])

<button
  type="button"
  @click="activeTab = '{{ $key }}'"
  :class="activeTab === '{{ $key }}'
        ? 'bg-brand-accent text-white shadow-card'
        : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white'"
  class="inline-flex items-center justify-center gap-2 rounded-button px-4 py-3 text-sm font-semibold transition-colors duration-150 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-brand-accent"
>
  @if ($icon)
  <x-dynamic-component :component="$icon" class="h-5 w-5" />
  @endif

  <span>{{ $label }}</span>
</button>
