<?php

namespace App\Filament\Resources\SeoSettings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SeoSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Référencement de la page d’accueil')
                    ->description(
                        'Ces informations peuvent apparaître dans les résultats de recherche et lors du partage du site.'
                    )
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre SEO')
                            ->placeholder(
                                'Jean-Baptiste Baudu — Développeur PHP, Laravel & DevOps'
                            )
                            ->helperText(
                                'Utilise un titre descriptif et concis, idéalement inférieur à 60 caractères.'
                            )
                            ->required()
                            ->maxLength(60)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Meta description')
                            ->placeholder(
                                'Développeur PHP et Laravel avec une double compétence en systèmes et réseaux, orienté DevOps, automatisation et applications robustes.'
                            )
                            ->helperText(
                                'Résume précisément la page en environ 150 à 160 caractères.'
                            )
                            ->required()
                            ->rows(4)
                            ->maxLength(320)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
