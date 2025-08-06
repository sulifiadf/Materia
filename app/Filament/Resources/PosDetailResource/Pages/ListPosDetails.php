<?php

namespace App\Filament\Resources\PosDetailResource\Pages;

use App\Filament\Resources\PosDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosDetails extends ListRecords
{
    protected static string $resource = PosDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
