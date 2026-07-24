<?php

namespace App\Filament\Resources\WorkMethods;

use App\Filament\Resources\WorkMethods\Pages\CreateWorkMethod;
use App\Filament\Resources\WorkMethods\Pages\EditWorkMethod;
use App\Filament\Resources\WorkMethods\Pages\ListWorkMethods;
use App\Filament\Resources\WorkMethods\Schemas\WorkMethodForm;
use App\Filament\Resources\WorkMethods\Tables\WorkMethodsTable;
use App\Models\WorkMethod;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkMethodResource extends Resource
{
    protected static ?string $model = WorkMethod::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return WorkMethodForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkMethodsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkMethods::route('/'),
            'create' => CreateWorkMethod::route('/create'),
            'edit' => EditWorkMethod::route('/{record}/edit'),
        ];
    }
}
