<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use App\Models\ElevatorUser;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('بيانات المستخدم')
                    ->schema([
                        TextInput::make('name')->label('الاسم')->required(),
                        // TextInput::make('email')->label('البريد الإلكتروني')->email()->required(),
                     
                        TextInput::make('phone')->label('رقم الهاتف')->tel()->required(),
                        TextInput::make('secondary_phone')->label('رقم هاتف إضافي')->tel(),
                        Select::make('city')
                                    ->label(' الفرع')
                                    ->options([
                                        'مكة' => 'مكة ',
                                        'جدة' => ' جدة',
                                    ]),
                        Toggle::make('is_previous_client')->label('عميل سابق'),
                        TextInput::make('location')->label('الموقع'),
                        TextInput::make('address')->label('العنوان'),
                        TextInput::make('elevators_count')->label('عدد المصاعد')->numeric()->default(0),
                        TextInput::make('elevator_type')->label('نوع المصعد'),
                        TextInput::make('commercial_register')->label('السجل التجاري'),
                        TextInput::make('tax_card')->label('الرقم الضريبي'),
                       
                        // Select::make('type')
                        //     ->label('نوع المستخدم')
                        //     ->options([
                        //         'technician' => 'فني',
                        //         'manager' => 'مدير',
                        //         'client' => 'عميل',
                        //         'customer_service' => 'خدمة عملاء',
                        //     ])
                        //     ->default('client'),
                    ]),

                Section::make('بيانات المصاعد')
                    ->schema([
                        Repeater::make('elevators')
                            ->relationship()
                            ->label('مصاعد المستخدم')
                            ->schema([
                                Select::make('city')
                                    ->label(' الفرع')
                                    ->options([
                                        'مكة' => 'مكة ',
                                        'جدة' => ' جدة',
                                    ])->required(),
                                TextInput::make('elevator_type')->label('نوع المصعد')->nullable(),
                                TextInput::make('location')->label('موقع المصعد')->nullable(),
                                TextInput::make('official_number')
                                    ->label('رقم المسؤول')
                                    ->maxLength(50),
                            TextInput::make('address')->label('عنوان المصعد'),
                                Toggle::make('is_subscribed')->label('مشترك في الصيانة؟'),
                                Select::make('payment_plan')
                                    ->label(' التقسيط')
                                    ->options([
                                        'quarterly' => 'ربع سنوي',
                                        'semi_annual' => 'نصف سنوي',
                                        'three_quarter' => 'تلت اربع سنوي',
                                        'annual' => 'سنة كاملة',
                                    ]),
                                Toggle::make('is_active')->label('مفعل؟'),
                            ])
                            ->columns(2)
                            ->minItems(1)
                            ->createItemButtonLabel('إضافة مصعد جديد'),
                    ])
                    ->collapsed(), // اختياري: يخلي القسم مطوي افتراضياً
            ]);
    }}
