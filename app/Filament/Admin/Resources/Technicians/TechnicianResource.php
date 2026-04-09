<?php

namespace App\Filament\Admin\Resources\Technicians;

use App\Filament\Admin\Resources\Technicians\Pages\CreateTechnician;
use App\Filament\Admin\Resources\Technicians\Pages\EditTechnician;
use App\Filament\Admin\Resources\Technicians\Pages\ListTechnicians;
use App\Filament\Admin\Resources\Technicians\Schemas\TechnicianForm;
use App\Filament\Admin\Resources\Technicians\Tables\TechniciansTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TechnicianResource extends Resource
{


   protected static ?string $navigationLabel = 'الفنيين';
   protected static ?string $pluralLabel = 'الفنيين';
   protected static ?string $modelLabel = 'فني';

    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'User ';

    public static function form(Schema $schema): Schema
    {
        return TechnicianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TechniciansTable::configure($table);
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
            'index' => ListTechnicians::route('/'),
            'create' => CreateTechnician::route('/create'),
            'edit' => EditTechnician::route('/{record}/edit'),
        ];
    }
}
