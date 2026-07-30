<?php

namespace App\Filament\Widgets;

use App\Models\DailyVisitStatistic;
use Carbon\CarbonImmutable;
use Filament\Widgets\ChartWidget;

class AudienceChart extends ChartWidget
{
  protected static ?int $sort = 2;

  protected ?string $heading = 'Audience figures for the last 30 days';

  protected ?string $description = 'Estimated daily unique visitors';

  protected int|string|array $columnSpan = 'full';

  protected function getData(): array
  {
    $today = CarbonImmutable::now(
      config('analytics.timezone', 'Europe/Paris'),
    )->startOfDay();

    $start = $today->subDays(29);

    $statistics = DailyVisitStatistic::query()
      ->whereBetween('visited_on', [
        $start->toDateString(),
        $today->toDateString(),
      ])
      ->pluck('unique_visitors', 'visited_on');

    $labels = [];
    $values = [];

    for ($day = $start; $day->lessThanOrEqualTo($today); $day = $day->addDay()) {
      $date = $day->toDateString();

      $labels[] = $day->locale('fr')->translatedFormat('d M');
      $values[] = (int) ($statistics[$date] ?? 0);
    }

    return [
      'datasets' => [
        [
          'label' => 'Unique visitors',
          'data' => $values,
          'borderColor' => '#ef4444',
          'backgroundColor' => 'rgba(239, 68, 68, 0.15)',
          'fill' => true,
          'tension' => 0.3,
        ],
      ],
      'labels' => $labels,
    ];
  }

  protected function getType(): string
  {
    return 'line';
  }
}
