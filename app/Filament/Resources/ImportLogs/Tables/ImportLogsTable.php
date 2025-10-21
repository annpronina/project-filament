<?php

namespace App\Filament\Resources\ImportLogs\Tables;

use Filament\Tables;
use Filament\Tables\Table;

class ImportLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('shop.name')
                    ->label('Veikals')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('file_type')
                    ->label('Faila tips')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('imported_at')
                    ->label('Importēts')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('shop_id')
                    ->label('Veikals')
                    ->relationship('shop', 'name'),
            ])
            ->searchPlaceholder('Meklēt pēc veikala vai faila tipa...')
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}
