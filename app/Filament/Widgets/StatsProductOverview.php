<?php

namespace App\Filament\Widgets;

use App\Models\DiscountProduct;
use App\Models\Order;
use App\Models\Products;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsProductOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Products::query()->count())
                ->description('Your current products total to sell')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Orders', Order::query()->count())
                ->description('Your current orders total')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Discount Product', DiscountProduct::query()->count())
                ->description('Your current discount product total')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
