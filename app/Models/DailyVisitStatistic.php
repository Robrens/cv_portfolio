<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
  'visited_on',
  'unique_visitors',
])]
class DailyVisitStatistic extends Model
{
  protected function casts(): array
  {
    return [
      'visited_on' => 'date',
      'unique_visitors' => 'integer',
    ];
  }
}
