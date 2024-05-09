<?php

namespace App\Filament\Resources\SpecialOrderResource\Pages;

use App\Filament\Resources\SpecialOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSpecialOrder extends ViewRecord
{
    protected static string $resource = SpecialOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
