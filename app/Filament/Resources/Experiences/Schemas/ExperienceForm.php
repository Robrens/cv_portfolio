<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Poste')
                    ->schema([
                        TextInput::make('job_title')
                            ->label('Intitulé du poste')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('company_name')
                            ->label('Entreprise')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('employment_type')
                            ->label('Type de contrat')
                            ->placeholder('CDI, alternance, stage…')
                            ->maxLength(100),

                        TextInput::make('location')
                            ->label('Localisation')
                            ->maxLength(255),

                        TextInput::make('company_url')
                            ->label('Site de l’entreprise')
                            ->url()
                            ->maxLength(2048)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Période')
                    ->schema([
                        Select::make('start_month')
                            ->label('Mois de début')
                            ->options(self::monthOptions())
                            ->required()
                            ->native(false),

                        TextInput::make('start_year')
                            ->label('Année de début')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(2100)
                            ->required(),

                        Toggle::make('is_current')
                            ->label('Poste actuel')
                            ->live()
                            ->afterStateUpdated(function (
                                bool $state,
                                Set $set,
                            ): void {
                                if ($state) {
                                    $set('end_month', null);
                                    $set('end_year', null);
                                }
                            })
                            ->columnSpanFull(),

                        Select::make('end_month')
                            ->label('Mois de fin')
                            ->options(self::monthOptions())
                            ->native(false)
                            ->disabled(fn (Get $get): bool => $get('is_current'))
                            ->required(fn (Get $get): bool => ! $get('is_current')),

                        TextInput::make('end_year')
                            ->label('Année de fin')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(2100)
                            ->disabled(fn (Get $get): bool => $get('is_current'))
                            ->required(fn (Get $get): bool => ! $get('is_current')),
                    ])
                    ->columns(2),

                Section::make('Contenu')
                    ->schema([
                        Textarea::make('summary')
                            ->label('Résumé')
                            ->helperText(
                                'Texte court affiché directement dans la carte du parcours.'
                            )
                            ->required()
                            ->rows(4),

                        Textarea::make('details')
                            ->label('Détails')
                            ->helperText(
                                'Description plus complète, destinée à la vue détaillée.'
                            )
                            ->rows(6),

                        TagsInput::make('responsibilities')
                            ->label('Responsabilités')
                            ->placeholder('Ajouter une responsabilité')
                            ->helperText('Appuie sur Entrée après chaque élément.'),

                        TagsInput::make('achievements')
                            ->label('Réalisations')
                            ->placeholder('Ajouter une réalisation')
                            ->helperText('Appuie sur Entrée après chaque élément.'),

                        TagsInput::make('technologies')
                            ->label('Technologies')
                            ->placeholder('Laravel')
                            ->helperText('Appuie sur Entrée après chaque technologie.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Affichage')
                    ->schema([
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

    /**
     * @return array<int, string>
     */
    private static function monthOptions(): array
    {
        return [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre',
        ];
    }
}
