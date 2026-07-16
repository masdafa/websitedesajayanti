<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Models\Staff;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;
    protected static ?string $navigationLabel = 'Perangkat Desa';
    protected static ?string $modelLabel = 'Perangkat Desa';
    protected static ?string $pluralModelLabel = 'Perangkat Desa';
    protected static ?int $navigationSort = 2;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-user-group';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Section::make('Data Perangkat Desa')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Foto Perangkat')
                        ->image()
                        ->directory('staff')
                        ->imageEditor()
                        ->avatar()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('position')
                        ->label('Jabatan')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Contoh: Kepala Desa, Sekretaris Desa...'),

                    Forms\Components\TextInput::make('order')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(1)
                        ->helperText('Nomor urutan tampil di halaman profil (angka kecil tampil lebih awal).'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('order')
                    ->label('No.')
                    ->sortable()
                    ->width(50),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
