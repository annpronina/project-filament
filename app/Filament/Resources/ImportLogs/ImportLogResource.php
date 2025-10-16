<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ImportLogResource\Pages;
use App\Models\ImportLog;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ImportLogResource extends Resource
{
    protected static ?string $model = ImportLog::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationLabel = 'Importu vēsture';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('source')->label('Avots')->sortable(),
                Tables\Columns\TextColumn::make('imported_at')->label('Datums')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('total_records')->label('Ieraksti'),
                Tables\Columns\TextColumn::make('errors_count')->label('Kļūdas'),
            ])
            ->defaultSort('imported_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImportLogs::route('/'),
        ];
    }
}

