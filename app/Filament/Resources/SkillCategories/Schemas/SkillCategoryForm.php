<?php

namespace App\Filament\Resources\SkillCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SkillCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Catégorie')
                    ->description(
                        'Cette catégorie sera affichée sous forme d’onglet dans la section des compétences.'
                    )
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom')
                            ->placeholder('Développement')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->label('Identifiant')
                            ->placeholder('developpement')
                            ->helperText(
                                'Utilisé dans le code. Minuscules, chiffres et tirets uniquement.'
                            )
                            ->required()
                            ->alphaDash()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder(
                                'Conception et développement d’applications web modernes...'
                            )
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label('Icône')
                            ->placeholder('code-bracket')
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
                    ->columns(2),
            ]);
    }
}
