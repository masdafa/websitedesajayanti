<?php

namespace App\Filament\Resources\PublicDocuments;

use App\Filament\Resources\PublicDocuments\Pages\CreatePublicDocument;
use App\Filament\Resources\PublicDocuments\Pages\EditPublicDocument;
use App\Filament\Resources\PublicDocuments\Pages\ListPublicDocuments;
use App\Filament\Resources\PublicDocuments\Schemas\PublicDocumentForm;
use App\Filament\Resources\PublicDocuments\Tables\PublicDocumentsTable;
use App\Models\PublicDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PublicDocumentResource extends Resource
{
    protected static ?string $model = PublicDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PublicDocumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicDocumentsTable::configure($table);
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
            'index' => ListPublicDocuments::route('/'),
            'create' => CreatePublicDocument::route('/create'),
            'edit' => EditPublicDocument::route('/{record}/edit'),
        ];
    }
}
