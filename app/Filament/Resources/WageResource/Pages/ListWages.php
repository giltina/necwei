<?php

namespace App\Filament\Resources\WageResource\Pages;

use App\Filament\Resources\WageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWages extends ListRecords
{
    protected static string $resource = WageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
