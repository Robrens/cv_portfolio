<?php

namespace App\Filament\Resources\SeoSettings\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeoSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre SEO'),

                TextColumn::make('description')
                    ->label('Meta description')
                    ->limit(80),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
