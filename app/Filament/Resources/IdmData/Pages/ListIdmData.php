<?php

namespace App\Filament\Resources\IdmData\Pages;

use App\Filament\Resources\IdmData\IdmDataResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIdmData extends ListRecords
{
    protected static string $resource = IdmDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
