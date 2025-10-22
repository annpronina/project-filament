<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Tables;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nosaukums')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('model')
                    ->label('Modelis')
                    ->sortable()
                    ->searchable(),    

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategorija')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Zīmols')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->label('Zīmols')
                    ->relationship('brand', 'name'),

                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategorija')
                    ->options([
                        'electronics' => 'Elektronika',
                        'home' => 'Mājas preces',
                        'toys' => 'Rotaļlietas',
                        'clothing' => 'Apģērbi',
                    ]),
            ])
            ->searchPlaceholder('Meklēt produktus...')
            ->actions([
                
            ])
            ->bulkActions([
                
            ]);
    }
}
