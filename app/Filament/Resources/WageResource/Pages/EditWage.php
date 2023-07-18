<?php

namespace App\Filament\Resources\WageResource\Pages;

use App\Filament\Resources\WageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWage extends EditRecord
{
    protected static string $resource = WageResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['updated_by'] = auth()->user()->name;
     
        return $data;
    }

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
