<?php

namespace App\Filament\Resources\OrdersResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Orders;

class OrdersStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pesanan Baru', Orders::query()->where('status_pesanan', 'pending')->count()),
            Stat::make('Pesanan Baru', Orders::query()->where('status_pesanan', 'pending')->count())
        ];
    }
}
