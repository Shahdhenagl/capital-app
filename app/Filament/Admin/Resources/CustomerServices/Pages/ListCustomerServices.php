<?php

namespace App\Filament\Admin\Resources\CustomerServices\Pages;

use App\Filament\Admin\Resources\CustomerServices\CustomerServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerServices extends ListRecords
{
    protected static string $resource = CustomerServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
