<?php

namespace App\Filament\Resources\OrderIResource\Pages;

use App\Filament\Resources\OrderIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderIS extends ListRecords
{
    protected static string $resource = OrderIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
