@props([ 'name', 'icon' => null, ])

<div {{ $attributes->
  merge([ 'class' => 'flex items-center gap-3 rounded-button bg-white/5 px-4 py-3 text-sm
  font-semibold text-slate-100 ring-1 ring-white/5 transition-colors duration-150 hover:bg-white/10'
  ]) }}> @if ($icon)
  <x-icons.icon :name="$icon" class="h-5 w-5 text-brand-accent" />
  @endif

  <span>{{ $name }}</span>
</div>
