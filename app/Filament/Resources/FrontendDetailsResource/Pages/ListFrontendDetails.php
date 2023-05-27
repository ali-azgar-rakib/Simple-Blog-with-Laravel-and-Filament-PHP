<?php

namespace App\Filament\Resources\FrontendDetailsResource\Pages;

use App\Filament\Resources\FrontendDetailsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFrontendDetails extends ListRecords
{
    protected static string $resource = FrontendDetailsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
