<?php

namespace App\Filament\Resources\WorkMethods\Pages;

use App\Filament\Resources\WorkMethods\WorkMethodResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkMethods extends ListRecords
{
    protected static string $resource = WorkMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
