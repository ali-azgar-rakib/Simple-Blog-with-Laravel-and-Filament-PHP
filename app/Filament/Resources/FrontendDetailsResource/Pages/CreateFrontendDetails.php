<?php

namespace App\Filament\Resources\FrontendDetailsResource\Pages;

use App\Filament\Resources\FrontendDetailsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFrontendDetails extends CreateRecord
{
    protected static string $resource = FrontendDetailsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
