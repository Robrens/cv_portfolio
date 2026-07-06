@props([
'label',
])

<span {{ $attributes->merge([
  'class' => 'inline-flex rounded-full bg-surface-muted px-3 py-1 text-xs font-semibold text-content-secondary'
]) }}>
  {{ $label }}
</span>
