<?php

namespace App\Filament\Resources\PublicDocuments\Pages;

use App\Filament\Resources\PublicDocuments\PublicDocumentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicDocument extends EditRecord
{
    protected static string $resource = PublicDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
