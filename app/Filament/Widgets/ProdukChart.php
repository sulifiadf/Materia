<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProdukChart extends ChartWidget
{
    protected static ?string $heading = 'Produk Terlaris';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => [10, 20, 30], // Jumlah produk per kategori
                    'backgroundColor' => [
                        '#FF6384', // Merah
                        '#FFCE56', // Kuning
                        '#36A2EB', // Biru
                    ],
                ],
            ],
            'labels' => [
                'Elektronik',
                'Pakaian',
                'Peralatan Rumah Tangga',
            ],


        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function extraAttributes(): array
{
    return [
        'style' => 'box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border-radius: 8px; height: 250px;',
        'class' => 'flex items-center justify-center p-4 bg-white',
    ];
}

}
