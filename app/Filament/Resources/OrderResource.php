<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('payment_status'),
                Tables\Columns\TextColumn::make('shipping_method'),
                Tables\Columns\TextColumn::make('purchase_option'),
                Tables\Columns\TextColumn::make('discount_amount')
                    ->searchable()
                    ->sortable()
                    ->money('IDR', true)
                    ->label('Discount'),
                Tables\Columns\TextColumn::make('grand_total')
                    ->searchable()
                    ->sortable()
                    ->money('IDR', true)
                    ->label('Total'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'process' => 'Process',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'canceled' => 'Canceled',
                    ])
                    ->label('Status'),

                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ])
                    ->label('Payment Status'),

                Tables\Filters\SelectFilter::make('shipping_method')
                    ->options([
                        'pengiriman_gratis' => 'Gratis',
                        'pengiriman_reguler' => 'Reguler',
                        'pengiriman_cepat' => 'Cepat',
                    ])
                    ->label('Shipping Method'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->infolist([
                        Section::make('Order Details')
                            ->schema([
                                TextEntry::make('order_number')
                                    ->columnSpan(2),
                                TextEntry::make('status')
                                    ->label('Order Status')
                                    ->badge(function (Order $record) {
                                        return match ($record->status) {
                                            'pending' => 'warning',
                                            'process' => 'secondary',
                                            'shipped' => 'success',
                                            'delivered' => 'primary',
                                            'canceled' => 'danger',
                                            default => 'primary',
                                        };
                                    }),
                                TextEntry::make('order_date')
                                    ->label('Order Date')
                                    ->date(),
                                TextEntry::make('payment_status')
                                    ->label('Payment Status')
                                    ->badge(function (Order $record) {
                                        return match ($record->payment_status) {
                                            'pending' => 'warning',
                                            'paid' => 'success',
                                            default => 'success',
                                        };
                                    }),
                                TextEntry::make('payment_due')
                                    ->label('Payment Due')
                                    ->date(),
                                TextEntry::make('purchase_option'),
                                TextEntry::make('shipping_method')
                                    ->label('Shipping Method'),
                                TextEntry::make('discount_amount')
                                    ->label('Discount')
                                    ->money('IDR', true),
                                TextEntry::make('shipping_cost')
                                    ->label('Shipping Cost')
                                    ->money('IDR', true),
                                TextEntry::make('grand_total')
                                    ->label('Total')
                                    ->money('IDR', true),
                            ])
                            ->columns(2)
                            ->collapsible(),
                        Section::make('Order Items')
                            ->schema([
                                TextEntry::make('items.product_name')
                                    ->label('Product Name'),
                                TextEntry::make('items.quantity')
                                    ->label('Quantity'),
                                TextEntry::make('items.discount_amount')
                                    ->money('IDR', true)
                                    ->label('Discount Amount'),
                                TextEntry::make('items.base_price')
                                    ->money('IDR', true)
                                    ->label('Price'),
                                TextEntry::make('items.base_total')
                                    ->money('IDR', true)
                                    ->label('Total'),
                            ])
                            ->columns(2)
                            ->collapsible(),
                        Section::make('Customer Details')
                            ->schema([
                                TextEntry::make('customer_name')
                                    ->columnSpan(2),
                                TextEntry::make('customer_phone'),
                                TextEntry::make('customer_email'),
                                TextEntry::make('customer_address'),
                                TextEntry::make('customer_city'),
                                TextEntry::make('customer_district'),
                                TextEntry::make('customer_regency'),
                                TextEntry::make('customer_province'),
                                TextEntry::make('customer_country'),
                                TextEntry::make('customer_postcode'),
                                TextEntry::make('customer_note'),
                            ])
                            ->columns()
                            ->collapsible(),
                    ])
                    ->label('Details'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
