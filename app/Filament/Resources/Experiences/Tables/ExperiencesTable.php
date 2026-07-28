<?php

namespace App\Filament\Resources\Experiences\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ExperiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_title')
                    ->label('Poste')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('company_name')
                    ->label('Entreprise')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_year')
                    ->label('Début')
                    ->formatStateUsing(
                        fn (int|string $state, $record): string => self::formatPeriod($record->start_month, $state),
                    )
                    ->sortable(),

                TextColumn::make('end_year')
                    ->label('Fin')
                    ->formatStateUsing(
                        fn (int|string|null $state, $record): string => $record->is_current
                            ? 'Aujourd’hui'
                            : self::formatPeriod($record->end_month, $state),
                    )
                    ->placeholder('—')
                    ->sortable(),

                TextColumn::make('employment_type')
                    ->label('Contrat')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('technologies')
                    ->label('Technologies')
                    ->badge()
                    ->separator(',')
                    ->limitList(4)
                    ->expandableLimitedList()
                    ->toggleable(),

                TextColumn::make('sort_order')
                    ->label('Ordre')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Visible'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    private static function formatPeriod(
        int|string|null $month,
        int|string|null $year,
    ): string {
        if ($year === null) {
            return '—';
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

        if ($month === null) {
            return (string) $year;
        }

        return ($months[(int) $month] ?? '').' '.$year;
    }
}
