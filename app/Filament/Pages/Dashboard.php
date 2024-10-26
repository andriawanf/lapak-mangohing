<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];
    public function getColumns(): int | string | array
    {
        return 1;
    }
}
