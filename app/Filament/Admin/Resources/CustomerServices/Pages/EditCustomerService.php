<?php

namespace App\Filament\Admin\Resources\CustomerServices\Pages;

use App\Filament\Admin\Resources\CustomerServices\CustomerServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerService extends EditRecord
{
    protected static string $resource = CustomerServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
