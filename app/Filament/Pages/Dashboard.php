<?php

// File: app/Filament/Pages/Dashboard.php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static string $routePath = '/';
    
    public function getWidgets(): array
    {
        return [
            // Stats (cards calculate) di ATAS
            \App\Filament\Widgets\StatsOverview::class,
            
            // Chart di BAWAH  
            \App\Filament\Widgets\PenjualanChart::class,

            \App\Filament\Widgets\ProdukChart::class,
        ];
    }

    public function getColumns(): int | string | array
    {
        return [
            'md' => 3,
            'xl' => 3,
        ];
    }
}