<?php

namespace App\Filament\Resources\IdmData\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IdmDataForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                TextInput::make('score')
                    ->numeric(),
                TextInput::make('status'),
                Textarea::make('summary')
                    ->columnSpanFull(),
            ]);
    }
}
