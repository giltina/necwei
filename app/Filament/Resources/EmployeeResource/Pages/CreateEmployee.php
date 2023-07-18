<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Helpers\Helper;

class CreateEmployee extends CreateRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['employee_number'] = Helper::employeeHelper($data['employer_id']);
        $data['created_by'] = auth()->user()->name;
     
        return $data;
    }
}
