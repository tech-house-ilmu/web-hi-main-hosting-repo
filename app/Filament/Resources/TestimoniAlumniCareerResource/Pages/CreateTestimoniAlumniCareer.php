<?php

namespace App\Filament\Resources\TestimoniAlumniCareerResource\Pages;

use App\Filament\Resources\TestimoniAlumniCareerResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTestimoniAlumniCareer extends CreateRecord
{
    protected static string $resource = TestimoniAlumniCareerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Testimoni alumni berhasil ditambahkan')
            ->body('Data testimoni alumni career telah disimpan.');
    }
}
