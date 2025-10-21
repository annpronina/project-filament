<?php

namespace App\Filament\Resources\ImportLogs\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ImportLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Select::make('shop_id')
                ->label('Veikals')
                ->relationship('shop', 'name')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('file_type')
                ->label('Faila tips')
                ->required(),

            Forms\Components\DateTimePicker::make('imported_at')
                ->label('Importēts')
                ->required(),
        ]);
    }
}
