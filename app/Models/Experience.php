<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'employment_type',
        'location',
        'company_url',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
        'is_current',
        'summary',
        'details',
        'responsibilities',
        'achievements',
        'technologies',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'start_year' => 'integer',
            'start_month' => 'integer',
            'end_year' => 'integer',
            'end_month' => 'integer',
            'is_current' => 'boolean',
            'responsibilities' => 'array',
            'achievements' => 'array',
            'technologies' => 'array',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected function periodLabel(): Attribute
    {
        return Attribute::get(function (): string {
            $start = $this->formatMonthYear(
                $this->start_month,
                $this->start_year,
            );

            $end = $this->is_current
                ? 'Aujourd’hui'
                : $this->formatMonthYear(
                    $this->end_month,
                    $this->end_year,
                );

            return "{$start} – {$end}";
        });
    }

    protected function titleLabel(): Attribute
    {
        return Attribute::get(
            fn (): string => "{$this->job_title} • {$this->company_name}",
        );
    }

    private function formatMonthYear(?int $month, ?int $year): string
    {
        if (! $year) {
            return '';
        }

        $months = [
            1 => 'Janv.',
            2 => 'Févr.',
            3 => 'Mars',
            4 => 'Avr.',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juil.',
            8 => 'Août',
            9 => 'Sept.',
            10 => 'Oct.',
            11 => 'Nov.',
            12 => 'Déc.',
        ];

        if (! $month) {
            return (string) $year;
        }

        return "{$months[$month]} {$year}";
    }

    protected function hasDetails(): Attribute
    {
        return Attribute::get(
            fn (): bool => filled($this->details)
                || filled($this->responsibilities)
                || filled($this->achievements),
        );
    }
}
