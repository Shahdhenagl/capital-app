<?php

namespace App\Filament\Admin\Resources\Managers\Pages;

use App\Filament\Admin\Resources\Managers\ManagerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateManager extends CreateRecord
{
    protected static string $resource = ManagerResource::class;
}
