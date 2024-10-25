<?php

namespace App\Filament\Resources\DiscountProductResource\Pages;

use App\Filament\Resources\DiscountProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscountProduct extends EditRecord
{
    protected static string $resource = DiscountProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
