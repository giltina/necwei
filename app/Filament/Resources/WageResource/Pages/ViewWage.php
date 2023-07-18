<?php

namespace App\Filament\Resources\WageResource\Pages;

use App\Filament\Resources\WageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWage extends ViewRecord
{
    protected static string $resource = WageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
