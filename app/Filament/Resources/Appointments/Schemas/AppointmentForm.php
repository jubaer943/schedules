<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('schedule_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
