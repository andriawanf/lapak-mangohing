<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product_number')
                    ->required(),
                Forms\Components\TextInput::make('product_name')
                    ->required()
                    ->minLength(5)
                    ->maxLength(255),
                Forms\Components\Textarea::make('product_description')
                    ->required()
                    ->columnSpan('full')
                    ->minLength(10)
                    ->maxLength(255),
                Forms\Components\Select::make('product_category')
                    ->options([
                        'Keripik' => 'Keripik',
                        'Makaroni' => 'Makaroni',
                        'Lain-lain' => 'Lain-lain',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('product_price')
                    ->numeric()
                    ->required()
                    ->prefix('Rp. ')
                    ->minValue(0),
                Forms\Components\TextInput::make('product_stock')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                Forms\Components\Select::make('product_tag')
                    ->required()
                    ->multiple()
                    ->options([
                        'Keripik' => 'Keripik',
                        'Makaroni' => 'Makaroni',
                        'Lain-lain' => 'Lain-lain',
                    ])
                    ->minItems(1)
                    ->maxItems(3),
                Forms\Components\TextInput::make('product_weight')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('product_length')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('product_width')
                    ->numeric()
                    ->required()
                    ->minValue(0),
                Forms\Components\TextInput::make('product_breadth')
                    ->numeric()
                    ->required()
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_number')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_description'),
                Tables\Columns\TextColumn::make('product_category'),
                Tables\Columns\TextColumn::make('product_stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product_price')
                    ->money('IDR', true)
                    ->numeric()
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_category')
                    ->options([
                        'Keripik' => 'Keripik',
                        'Makaroni' => 'Makaroni',
                        'Lain-lain' => 'Lain-lain',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
