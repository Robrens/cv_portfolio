@props([ 'name' => null, ]) @php $normalizedName = filled($name) ? strtolower(trim($name)) : null;
$customIcons = [ 'github', 'linkedin', ]; $icon = null; if ( $normalizedName && !
in_array($normalizedName, $customIcons, true) ) { $heroiconName = str_starts_with($normalizedName,
'heroicon-') ? $normalizedName : 'heroicon-o-' . $normalizedName; try { $icon = svg( $heroiconName,
$attributes->get('class'), $attributes ->except('class') ->getAttributes(), ); } catch (\Throwable)
{ $icon = null; } } @endphp @switch($normalizedName) @case('github')
<x-icons.github {{ $attributes }} />
@break @case('linkedin')
<x-icons.linkedin {{ $attributes }} />
@break @default @if ($icon) {!! $icon->toHtml() !!} @endif @endswitch
