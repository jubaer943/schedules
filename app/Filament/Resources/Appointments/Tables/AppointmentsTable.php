<?php

namespace App\Filament\Resources\Appointments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('schedule.date')
                            ->label('Appointment Date')
                            ->date() 
                            ->sortable(),
                TextColumn::make('schedule.schedule')
                            ->label('Time Slot')
                            ->sortable(),
                TextColumn::make('schedule.is_available')
                        ->label('Availability')
                        ->badge()
                        ->color(fn (string $state): string => $state ? 'success' : 'danger')
                        ->formatStateUsing(fn (string $state): string => $state ? 'Available' : 'Booked'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
