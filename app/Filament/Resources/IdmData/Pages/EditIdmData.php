<?php

namespace App\Filament\Resources\IdmData\Pages;

use App\Filament\Resources\IdmData\IdmDataResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIdmData extends EditRecord
{
    protected static string $resource = IdmDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
