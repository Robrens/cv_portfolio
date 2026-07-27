<?php

namespace App\Filament\Resources\Profiles\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PassionsRelationManager extends RelationManager
{
    protected static string $relationship = 'passions';

    protected static ?string $title = 'Passions';

    protected static ?string $modelLabel = 'passion';

    protected static ?string $pluralModelLabel = 'passions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Titre')
                    ->placeholder('Musique')
                    ->required()
                    ->maxLength(255),

                TextInput::make('icon')
                    ->label('Icône')
                    ->placeholder('musical-note')
                    ->helperText(
                        'Nom de l’icône utilisée par le composant Blade.'
                    )
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->placeholder(
                        'Metal, concerts et festivals : la musique occupe une place importante dans mon quotidien.'
                    )
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),

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
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(60)
                    ->wrap(),

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
            ->headerActions([
                CreateAction::make()
                    ->label('Ajouter une passion'),
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
