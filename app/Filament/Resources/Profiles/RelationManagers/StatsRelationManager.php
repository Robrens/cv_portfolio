<?php

namespace App\Filament\Resources\Profiles\RelationManagers;

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

class StatsRelationManager extends RelationManager
{
    protected static string $relationship = 'stats';

    protected static ?string $title = 'Statistiques';

    protected static ?string $modelLabel = 'statistique';

    protected static ?string $pluralModelLabel = 'statistiques';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->label('Valeur')
                    ->placeholder('5+')
                    ->required()
                    ->maxLength(50),

                TextInput::make('unit')
                    ->label('Unité')
                    ->placeholder('années')
                    ->maxLength(100),

                TextInput::make('label')
                    ->label('Libellé')
                    ->placeholder('Développement applicatif')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('icon')
                    ->label('Icône')
                    ->placeholder('code-bracket')
                    ->helperText('Nom de l’icône utilisée par le site.')
                    ->maxLength(255),

                TextInput::make('sort_order')
                    ->label('Ordre')
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
            ->recordTitleAttribute('label')
            ->columns([
                TextColumn::make('value')
                    ->label('Valeur')
                    ->searchable(),

                TextColumn::make('unit')
                    ->label('Unité')
                    ->placeholder('—'),

                TextColumn::make('label')
                    ->label('Libellé')
                    ->searchable()
                    ->wrap(),

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
                    ->label('Ajouter une statistique'),
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
