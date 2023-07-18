<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Helpers\Helper;
 
class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    
    $data['student_id'] = Helper::test($data['student_id'], 2, 'STD'); 
 
    return $data;
}
}
