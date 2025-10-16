<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produkti';
    protected static ?string $pluralModelLabel = 'Produkti';
    protected static ?string $modelLabel = 'Produkts';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nosaukums')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Apraksts')
                ->rows(4),

            Forms\Components\TextInput::make('brand')
                ->label('Zīmols'),

            Forms\Components\Select::make('category_id')
                ->label('Kategorija')
                ->relationship('category', 'name')
                ->required(),

            Forms\Components\FileUpload::make('image_url')
                ->label('Attēls')
                ->image()
                ->directory('products/images'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')->label('Attēls'),
                Tables\Columns\TextColumn::make('name')->label('Nosaukums')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('brand')->label('Zīmols')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Kategorija')->sortable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Atjaunots')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Kategorija')
                    ->relationship('category', 'name'),

                Tables\Filters\Filter::make('has_image')
                    ->label('Ir attēls')
                    ->query(fn ($query) => $query->whereNotNull('image_url')),
            ])
            ->defaultSort('updated_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
