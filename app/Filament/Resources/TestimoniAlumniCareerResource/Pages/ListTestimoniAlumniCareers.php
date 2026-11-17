<?php

namespace App\Filament\Resources\TestimoniAlumniCareerResource\Pages;

use App\Filament\Resources\TestimoniAlumniCareerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestimoniAlumniCareers extends ListRecords
{
    protected static string $resource = TestimoniAlumniCareerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
