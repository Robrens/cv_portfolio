<?php

namespace App\Filament\Widgets;

use App\Models\DailyVisitStatistic;
use Carbon\CarbonImmutable;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AudienceOverview extends StatsOverviewWidget
{
  protected static ?int $sort = 1;

  protected function getStats(): array
  {
    $today = CarbonImmutable::now(
      config('analytics.timezone', 'Europe/Paris'),
    )->startOfDay();

    $todayVisitors = $this->sumBetween($today, $today);
    $lastSevenDays = $this->sumBetween(
      $today->subDays(6),
      $today,
    );
    $lastThirtyDays = $this->sumBetween(
      $today->subDays(29),
      $today,
    );
    $previousThirtyDays = $this->sumBetween(
      $today->subDays(59),
      $today->subDays(30),
    );

    $evolution = $this->calculateEvolution(
      $lastThirtyDays,
      $previousThirtyDays,
    );

    return [
      Stat::make(
        'Visiteurs uniques aujourd’hui',
        number_format($todayVisitors, 0, ',', ' '),
      )
        ->description('Depuis minuit')
        ->descriptionIcon('heroicon-m-calendar-days')
        ->color('primary'),

      Stat::make(
        'Visiteurs uniques sur 7 jours',
        number_format($lastSevenDays, 0, ',', ' '),
      )
        ->description('Somme des visiteurs uniques quotidiens')
        ->descriptionIcon('heroicon-m-user-group')
        ->color('info'),

      Stat::make(
        'Visiteurs uniques sur 30 jours',
        number_format($lastThirtyDays, 0, ',', ' '),
      )
        ->description($evolution['description'])
        ->descriptionIcon($evolution['icon'])
        ->color($evolution['color']),
    ];
  }

  private function sumBetween(
    CarbonImmutable $start,
    CarbonImmutable $end,
  ): int {
    return (int) DailyVisitStatistic::query()
      ->whereBetween('visited_on', [
        $start->toDateString(),
        $end->toDateString(),
      ])
      ->sum('unique_visitors');
  }

  /**
   * @return array{
   *     description: string,
   *     icon: string,
   *     color: string
   * }
   */
  private function calculateEvolution(
    int $current,
    int $previous,
  ): array {
    if ($previous === 0) {
      return [
        'description' => $current === 0
          ? 'Aucune visite sur la période'
          : 'Pas de période précédente comparable',
        'icon' => 'heroicon-m-minus',
        'color' => 'gray',
      ];
    }

    $percentage = (($current - $previous) / $previous) * 100;
    $roundedPercentage = round(abs($percentage), 1);

    if ($percentage > 0) {
      return [
        'description' => "+{$roundedPercentage} % compared to the previous 30 days",
        'icon' => 'heroicon-m-arrow-trending-up',
        'color' => 'success',
      ];
    }

    if ($percentage < 0) {
      return [
        'description' => "-{$roundedPercentage} % compared to the previous 30 days",
        'icon' => 'heroicon-m-arrow-trending-down',
        'color' => 'danger',
      ];
    }

    return [
      'description' => 'Stable compared to the previous 30 days',
      'icon' => 'heroicon-m-minus',
      'color' => 'gray',
    ];
  }
}
