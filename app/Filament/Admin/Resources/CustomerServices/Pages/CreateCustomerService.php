<?php

namespace App\Filament\Admin\Resources\CustomerServices\Pages;

use App\Filament\Admin\Resources\CustomerServices\CustomerServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerService extends CreateRecord
{
    protected static string $resource = CustomerServiceResource::class;
}
