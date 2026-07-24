<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identité')
                    ->description('Informations principales affichées sur le site.')
                    ->schema([
                        TextInput::make('first_name')
                            ->label('Prénom')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('last_name')
                            ->label('Nom')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('job_title')
                            ->label('Intitulé du poste')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Hero')
                    ->description(
                        'Le titre est découpé pour appliquer les deux couleurs de la maquette.'
                    )
                    ->schema([
                        TextInput::make('hero_eyebrow')
                            ->label('Surtitre')
                            ->placeholder('Développeur applicatif & systèmes')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('hero_title_before')
                            ->label('Début du titre')
                            ->placeholder('Je construis des applications')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('hero_title_primary_highlight')
                            ->label('Texte en rouge')
                            ->placeholder('utiles')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('hero_title_middle')
                            ->label('Milieu du titre')
                            ->placeholder('et des infrastructures')
                            ->maxLength(255),

                        TextInput::make('hero_title_secondary_highlight')
                            ->label('Texte en bleu')
                            ->placeholder('fiables')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('hero_title_after')
                            ->label('Fin du titre')
                            ->placeholder('.')
                            ->maxLength(255),

                        Textarea::make('hero_description')
                            ->label('Description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        FileUpload::make('portrait_path')
                            ->label('Portrait')
                            ->disk('public')
                            ->directory('images/hero')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatioOptions([
                                '4:5',
                            ])
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                            ])
                            ->maxSize(5 * 1024)
                            ->openable()
                            ->downloadable()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('À propos')
                    ->schema([
                        TextInput::make('about_eyebrow')
                            ->label('Surtitre')
                            ->default('À propos')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('about_title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('about_description')
                            ->label('Premier paragraphe')
                            ->required()
                            ->rows(5),

                        Textarea::make('about_secondary_description')
                            ->label('Second paragraphe')
                            ->rows(5),
                    ])
                    ->columns(2),

                Section::make('Passions & moi')
                    ->description(
                        'Textes généraux de la section et configuration de la playlist Spotify.'
                    )
                    ->schema([
                        TextInput::make('passions_eyebrow')
                            ->label('Surtitre')
                            ->placeholder('Passions & moi')
                            ->maxLength(255),

                        TextInput::make('passions_title')
                            ->label('Titre')
                            ->placeholder('Au-delà du code')
                            ->maxLength(255),

                        TextInput::make('passions_subtitle')
                            ->label('Sous-titre')
                            ->placeholder(
                                'Parce qu’un bon équilibre nourrit aussi la créativité.'
                            )
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('passions_description')
                            ->label('Premier paragraphe')
                            ->rows(5),

                        Textarea::make('passions_secondary_description')
                            ->label('Second paragraphe')
                            ->rows(5),

                        TextInput::make('spotify_title')
                            ->label('Titre du bloc Spotify')
                            ->placeholder('Ce qui tourne en boucle')
                            ->maxLength(255),

                        Textarea::make('spotify_description')
                            ->label('Description du bloc Spotify')
                            ->rows(4),

                        TextInput::make('spotify_url')
                            ->label('URL de la playlist Spotify')
                            ->placeholder(
                                'https://open.spotify.com/playlist/…'
                            )
                            ->helperText(
                                'Utilise l’URL complète d’une playlist publique Spotify.'
                            )
                            ->url()
                            ->rules([
                                'nullable',
                                'starts_with:https://open.spotify.com/playlist/',
                            ])
                            ->maxLength(2048)
                            ->columnSpanFull(),

                        Toggle::make('passions_is_active')
                            ->label('Afficher la section')
                            ->default(true)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Informations générales')
                    ->schema([
                        TextInput::make('location')
                            ->label('Localisation')
                            ->maxLength(255),

                        TextInput::make('availability')
                            ->label('Disponibilité')
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Adresse e-mail')
                            ->email()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('CV')
                    ->schema([
                        FileUpload::make('resume_path')
                            ->label('Fichier PDF')
                            ->disk('public')
                            ->directory('documents/resumes')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5 * 1024)
                            ->downloadable()
                            ->openable(),
                    ]),

                Section::make('Appel à l’action')
                    ->description('Bloc de contact affiché en bas de la page.')
                    ->schema([
                        TextInput::make('contact_title')
                            ->label('Titre')
                            ->maxLength(255),

                        TextInput::make('contact_button_label')
                            ->label('Texte du bouton')
                            ->placeholder('Me contacter')
                            ->maxLength(255),

                        Textarea::make('contact_description')
                            ->label('Description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
