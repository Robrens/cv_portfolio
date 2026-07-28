<?php

namespace App\View\Components\Icons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
  public ?string $component;

  public function __construct(?string $name = null)
  {
    $normalizedName = filled($name)
      ? strtolower(trim($name))
      : null;

    $this->component = match ($normalizedName) {
      null => null,
      'github' => 'icons.github',
      'linkedin' => 'icons.linkedin',
      default => str_starts_with($normalizedName, 'heroicon-')
        ? $normalizedName
        : 'heroicon-o-' . $normalizedName,
    };
  }

  public function render(): View
  {
    return view('components.icons.icon');
  }
}
