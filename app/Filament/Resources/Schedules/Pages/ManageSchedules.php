<?php

namespace App\Filament\Resources\Schedules\Pages;

use App\Filament\Resources\Schedules\SchedulesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSchedules extends ManageRecords
{
    protected static string $resource = SchedulesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
