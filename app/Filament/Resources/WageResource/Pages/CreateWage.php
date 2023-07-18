<?php

namespace App\Filament\Resources\WageResource\Pages;

use App\Filament\Resources\WageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWage extends CreateRecord
{
    protected static string $resource = WageResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->user()->name;
     
        return $data;
    }
}
