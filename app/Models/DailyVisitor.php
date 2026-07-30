<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'visited_on',
    'fingerprint',
])]
class DailyVisitor extends Model
{
    protected function casts(): array
    {
        return [
            'visited_on' => 'date',
        ];
    }
}
