<?php

namespace App\Filament\Admin\Resources\Managers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ManagerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                        TextInput::make('name')->label('الاسم')->required(),
                        TextInput::make('email')->label('البريد الإلكتروني')->email()->required(),
                        TextInput::make('phone')->label('رقم الهاتف')->tel(),
                         Select::make('city')
                                    ->label(' الفرع')
                                    ->options([
                                        'مكة' => 'مكة ',
                                        'جدة' => ' جدة',
                                    ]),
                        TextInput::make('secondary_phone')->label('رقم هاتف إضافي')->tel(),
                TextInput::make('password')
                ->label('كلمة المرور')
                ->password() 
                    ]);
    }
}
