<?php

namespace App\Filament\Resources\WorkMethods\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WorkMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Méthode de travail')
                    ->description(
                        'Cette méthode sera affichée dans la section « Ma façon de travailler ».'
                    )
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre')
                            ->placeholder('Comprendre')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('icon')
                            ->label('Icône')
                            ->placeholder('light-bulb')
                            ->helperText('Nom de l’icône utilisée sur le site.')
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder(
                                'Analyse du besoin, des contraintes techniques et des objectifs métier.'
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
                    ->columns(2),
            ]);
    }
}
