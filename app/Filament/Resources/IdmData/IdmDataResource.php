<?php

namespace App\Filament\Resources\IdmData;

use App\Filament\Resources\IdmData\Pages\CreateIdmData;
use App\Filament\Resources\IdmData\Pages\EditIdmData;
use App\Filament\Resources\IdmData\Pages\ListIdmData;
use App\Filament\Resources\IdmData\Schemas\IdmDataForm;
use App\Filament\Resources\IdmData\Tables\IdmDataTable;
use App\Models\IdmData;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IdmDataResource extends Resource
{
    protected static ?string $model = IdmData::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return IdmDataForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IdmDataTable::configure($table);
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
            'index' => ListIdmData::route('/'),
            'create' => CreateIdmData::route('/create'),
            'edit' => EditIdmData::route('/{record}/edit'),
        ];
    }
}
