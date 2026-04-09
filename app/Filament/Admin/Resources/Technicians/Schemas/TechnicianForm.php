<?php

namespace App\Filament\Admin\Resources\Technicians\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class TechnicianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                  TextInput::make('name')->label('الاسم')->required(),
                        TextInput::make('phone')->label('رقم الهاتف')->tel()->required(),
                        TextInput::make('secondary_phone')->label('رقم هاتف إضافي')->tel(),
                       Select::make('city')
                                    ->label(' الفرع')
                                    ->options([
                                        'مكة' => 'مكة ',
                                        'جدة' => ' جدة',
                                    ])->required(),
            ]);
    }
}
