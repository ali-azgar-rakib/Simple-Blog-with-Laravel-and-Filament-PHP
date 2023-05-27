<?php

namespace App\Filament\Resources\FrontendDetailsResource\Pages;

use App\Filament\Resources\FrontendDetailsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFrontendDetails extends EditRecord
{
    protected static string $resource = FrontendDetailsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
