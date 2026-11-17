<?php

namespace App\Filament\Resources\HITCCProgrammeResource\Pages;

use App\Filament\Resources\HITCCProgrammeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHITCCProgrammes extends ListRecords
{
    protected static string $resource = HITCCProgrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
