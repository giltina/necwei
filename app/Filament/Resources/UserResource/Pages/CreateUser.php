<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Helpers\Helper;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

protected function mutateFormDataBeforeCreate(array $data): array

{
    $data['email'] = 'kudzimuzenda@gmail.com';

    return $data;
}

}
