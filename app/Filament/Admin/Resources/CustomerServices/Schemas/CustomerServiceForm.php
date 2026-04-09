<?php

namespace App\Filament\Admin\Resources\CustomerServices\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
class CustomerServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                      TextInput::make('name')->label('الاسم')->required(),
                        TextInput::make('email')->label('البريد الإلكتروني')->email()->required(),
                        TextInput::make('phone')->label('رقم الهاتف')->tel()->required(),
                        TextInput::make('secondary_phone')->label('رقم هاتف إضافي')->tel(),
                TextInput::make('password')
                ->label('كلمة المرور')
                ->password()->required()
                    ]);
        
    }
}
