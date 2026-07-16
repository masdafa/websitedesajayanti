<?php

namespace App\Filament\Resources\PublicDocuments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PublicDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('category'),
                TextInput::make('file_path'),
                DatePicker::make('date_issued'),
            ]);
    }
}
