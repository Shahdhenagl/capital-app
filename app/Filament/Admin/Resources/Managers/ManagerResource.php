<?php

namespace App\Filament\Admin\Resources\Managers;

use App\Filament\Admin\Resources\Managers\Pages\CreateManager;
use App\Filament\Admin\Resources\Managers\Pages\EditManager;
use App\Filament\Admin\Resources\Managers\Pages\ListManagers;
use App\Filament\Admin\Resources\Managers\Schemas\ManagerForm;
use App\Filament\Admin\Resources\Managers\Tables\ManagersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ManagerResource extends Resource
{

   protected static ?string $navigationLabel = 'المشرفين';
   protected static ?string $pluralLabel = 'المشرفين';
   protected static ?string $modelLabel = 'مشرف';

    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User';

    public static function form(Schema $schema): Schema
    {
        return ManagerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManagersTable::configure($table);
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
            'index' => ListManagers::route('/'),
            'create' => CreateManager::route('/create'),
            'edit' => EditManager::route('/{record}/edit'),
        ];
    }
}
