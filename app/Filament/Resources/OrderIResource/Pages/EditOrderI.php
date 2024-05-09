<?php

namespace App\Filament\Resources\OrderIResource\Pages;

use App\Filament\Resources\OrderIResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderI extends EditRecord
{
    protected static string $resource = OrderIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
