<?php

namespace App\Filament\Resources\OrderIResource\Pages;

use App\Filament\Resources\OrderIResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOrderI extends ViewRecord
{
    protected static string $resource = OrderIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
