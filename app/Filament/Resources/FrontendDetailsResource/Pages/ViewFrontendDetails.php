<?php

namespace App\Filament\Resources\FrontendDetailsResource\Pages;

use App\Filament\Resources\FrontendDetailsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFrontendDetails extends ViewRecord
{
    protected static string $resource = FrontendDetailsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
