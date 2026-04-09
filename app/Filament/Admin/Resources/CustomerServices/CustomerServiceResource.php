<?php

namespace App\Filament\Admin\Resources\CustomerServices;

use App\Filament\Admin\Resources\CustomerServices\Pages\CreateCustomerService;
use App\Filament\Admin\Resources\CustomerServices\Pages\EditCustomerService;
use App\Filament\Admin\Resources\CustomerServices\Pages\ListCustomerServices;
use App\Filament\Admin\Resources\CustomerServices\Schemas\CustomerServiceForm;
use App\Filament\Admin\Resources\CustomerServices\Tables\CustomerServicesTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CustomerServiceResource extends Resource
{


protected static ?string $navigationLabel = 'خدمة العملاء';
   protected static ?string $pluralLabel = 'خدمة العملاء';
   protected static ?string $modelLabel = 'خدمة العملاء';
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User';

    public static function form(Schema $schema): Schema
    {
        return CustomerServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerServices::route('/'),
            'create' => CreateCustomerService::route('/create'),
            'edit' => EditCustomerService::route('/{record}/edit'),
        ];
    }
}
