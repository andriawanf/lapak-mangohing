<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountProductResource\Pages;
use App\Filament\Resources\DiscountProductResource\RelationManagers;
use App\Models\Discount;
use App\Models\DiscountProduct;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountProductResource extends Resource
{
    protected static ?string $model = DiscountProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('discount_id')
                    ->required()
                    ->relationship('discount', 'discount_percentage')
                    ->options(Discount::all()->pluck('discount_percentage', 'id'))
                    ->prefix('%'),
                Forms\Components\Select::make('product_id')
                    ->required()
                    ->label('Product')
                    ->relationship('product', 'product_name')
                    ->options(Products::all()->pluck('product_name', 'id')),
                Forms\Components\DatePicker::make('effective_date')
                    ->required()
                    ->date()
                    ->label('Effective Date'),
                Forms\Components\DatePicker::make('expiry_date')
                    ->required()
                    ->date()
                    ->label('Expiry Date')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('discount.discount_percentage')
                    ->label('Discount %')
                    ->sortable()
                    ->searchable()
                    ->suffix('%'),
                Tables\Columns\TextColumn::make('product.product_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('effective_date')
                    ->sortable()
                    ->searchable()
                    ->date(),
                Tables\Columns\TextColumn::make('expiry_date')
                    ->sortable()
                    ->searchable()
                    ->date(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListDiscountProducts::route('/'),
            // 'create' => Pages\CreateDiscountProduct::route('/create'),
            // 'edit' => Pages\EditDiscountProduct::route('/{record}/edit'),
        ];
    }
}
