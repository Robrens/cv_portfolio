<?php

namespace App\Filament\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Réseau ou lien externe')
                    ->description(
                        'Ce lien sera affiché dans la colonne « Me suivre » du footer.'
                    )
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->placeholder('GitHub')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('url')
                            ->label('Adresse du lien')
                            ->placeholder('https://github.com/Robrens')
                            ->url()
                            ->required()
                            ->maxLength(2048),

                        TextInput::make('icon')
                            ->label('Icône')
                            ->placeholder('linkedin, github ou heroicon-o-globe-alt')
                            ->helperText(
                                'Utilisez github, linkedin ou le nom complet d’un Heroicon, par exemple heroicon-o-globe-alt.'
                            )
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
                    ->columns(2),
            ]);
    }
}
