<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Karyawan;
use App\Models\Produk;
use App\Models\orders;
use Illuminate\Support\HtmlString;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $countKaryawanAktif = Karyawan::where('status', 'aktif')->count();
        $countProdukTersedia = Produk::where('stok', '>', 0)->count();
        $countJumlahOrders = orders::where('status_pesanan', '!=', 'batal')->count();
        return [
Stat::make(
    new HtmlString('
        <div class="custom-stat-layout">
            <div class="stat-icon">
                <svg class="w-8 h-8  mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                </svg>
            </div>
            <div class="stat-label text-sm font-medium text-gray-600 mb-2">
                Jumlah Karyawan Aktif
            </div>
            <div class="stat-value text-3xl font-bold text-gray-900">
                ' . $countKaryawanAktif . '
            </div>
        </div>
    '),
    ''
)
->color('success')
->extraAttributes([
    'style' => 'box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border-radius: 8px; height: 120px;',
    'class' => 'flex items-center justify-center p-4',
]),
            Stat::make(
    new HtmlString('
        <div class="custom-stat-layout">
            <div class="stat-icon">
                <svg class="w-8 h-8  mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
    <path d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
</svg>

            </div>
            <div class="stat-label text-sm font-medium text-gray-600 mb-2">
                Total Produk
            </div>
            <div class="stat-value text-3xl font-bold text-gray-900">
                ' . $countProdukTersedia . '
            </div>
        </div>
    '),
    ''
)
->color('success')
->extraAttributes([
    'style' => 'box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border-radius: 8px; height: 120px;',
    'class' => 'flex items-center justify-center p-4',
]),
            Stat::make(
    new HtmlString('
        <div class="custom-stat-layout">
            <div class="stat-icon">
                <svg class="w-8 h-8  mx-auto mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />

            </div>
            <div class="stat-label text-sm font-medium text-gray-600 mb-2">
                Jumlah Penjualan
            </div>
            <div class="stat-value text-3xl font-bold text-gray-900">
                ' . $countJumlahOrders . '
            </div>
        </div>
    '),
    ''
)
->color('success')
->extraAttributes([
    'style' => 'box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border-radius: 8px; height: 120px;',
    'class' => 'flex items-center justify-center p-4',
]),

        ];
    }

}





