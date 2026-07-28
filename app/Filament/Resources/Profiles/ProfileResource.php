<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\CreateProfile;
use App\Filament\Resources\Profiles\Pages\EditProfile;
use App\Filament\Resources\Profiles\Pages\ListProfiles;
use App\Filament\Resources\Profiles\RelationManagers\PassionsRelationManager;
use App\Filament\Resources\Profiles\RelationManagers\StatsRelationManager;
use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Profil';

    protected static ?string $modelLabel = 'profil';

    protected static ?string $pluralModelLabel = 'profils';

    public static function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            StatsRelationManager::class,
            PassionsRelationManager::class,

        ];
    }

    public static function canCreate(): bool
    {
        return ! Profile::query()->exists();
    }

    public static function getNavigationUrl(): string
    {
        $profile = Profile::query()->first();

        return $profile
            ? static::getUrl('edit', ['record' => $profile])
            : static::getUrl('create');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProfiles::route('/'),
            'create' => CreateProfile::route('/create'),
            'edit' => EditProfile::route('/{record}/edit'),
        ];
    }
}
