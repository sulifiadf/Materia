<?php

namespace App\Filament\Resources\AbsensiKaryawanResource\Pages;

use App\Filament\Resources\AbsensiKaryawanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiKaryawan extends EditRecord
{
    protected static string $resource = AbsensiKaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
