<?php

namespace App\Filament\Resources\SkillCategories\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SkillsRelationManager extends RelationManager
{
    protected static string $relationship = 'skills';

    protected static ?string $title = 'Compétences';

    protected static ?string $modelLabel = 'compétence';

    protected static ?string $pluralModelLabel = 'compétences';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom')
                    ->placeholder('Laravel')
                    ->required()
                    ->maxLength(255),

                TextInput::make('icon')
                    ->label('Icône')
                    ->placeholder('laravel')
                    ->helperText('Nom de l’icône utilisée sur le site.')
                    ->maxLength(255),

                TextInput::make('sort_order')
                    ->label('Ordre d’affichage')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Visible sur le site')
                    ->default(true),
            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('icon')
                    ->label('Icône')
                    ->placeholder('—'),

                TextColumn::make('sort_order')
                    ->label('Ordre')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Visible'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->headerActions([
                CreateAction::make()
                    ->label('Ajouter une compétence'),
            ])
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
