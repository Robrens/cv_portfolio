<?php

namespace App\Filament\Resources\WorkMethods\Pages;

use App\Filament\Resources\WorkMethods\WorkMethodResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWorkMethod extends EditRecord
{
    protected static string $resource = WorkMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
