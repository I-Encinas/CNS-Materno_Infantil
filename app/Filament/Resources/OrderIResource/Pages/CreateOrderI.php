<?php

namespace App\Filament\Resources\OrderIResource\Pages;

use App\Filament\Resources\OrderIResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateOrderI extends CreateRecord
{
    protected static string $resource = OrderIResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
        $data['order_type_id'] = 2;
        $data['status'] = false;
    
        return $data;
    }
}
