<?php

namespace App\Filament\Resources\EmployerResource\Pages;

use App\Filament\Resources\EmployerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Helpers\Helper;

class CreateEmployer extends CreateRecord
{
    protected static string $resource = EmployerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['registration_number'] = Helper::employerHelper('registration_number', 2,  $data['sector_id']);
        $data['created_by'] = auth()->user()->name;
        
     
        return $data;
    }
}
