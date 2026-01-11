<?php

namespace App\Filament\Resources\Schedules;

use App\Filament\Resources\Schedules\Pages\ManageSchedules;
use App\Models\Schedules;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\Summarizers\Count;

class SchedulesResource extends Resource
{
    protected static ?string $model = \App\Models\Schedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date')
                    ->required()
                    ->native(false) 
                    ->displayFormat('d/m/Y'),

                TextInput::make('schedule') 
                    ->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
            TextColumn::make('index')
                ->label('#')
                ->rowIndex(),
                TextColumn::make('date')
                    ->label('Appointment Date')
                    ->searchable(),
                TextColumn::make('schedule')
                    ->label('Time Slot')
                    ->searchable(),
                TextColumn::make('is_available')
                        ->label('Availability')
                        ->badge()
                        ->color(fn (string $state): string => $state ? 'success' : 'danger')
                        ->formatStateUsing(fn (string $state): string => $state ? 'Available' : 'Booked'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSchedules::route('/'),
        ];
    }
}
