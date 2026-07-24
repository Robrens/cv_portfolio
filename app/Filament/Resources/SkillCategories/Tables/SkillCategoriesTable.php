<?php

namespace App\Filament\Resources\SkillCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SkillCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Identifiant')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('skills_count')
                    ->label('Compétences')
                    ->counts('skills')
                    ->sortable(),

                TextColumn::make('icon')
                    ->label('Icône')
                    ->placeholder('—')
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
}
