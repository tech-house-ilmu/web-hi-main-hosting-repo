<?php

namespace App\Filament\Resources\LeadersDetailsAboutResource\Pages;

use App\Filament\Resources\LeadersDetailsAboutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeadersDetailsAbout extends EditRecord
{
    protected static string $resource = LeadersDetailsAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
