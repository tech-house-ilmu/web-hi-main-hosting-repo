<?php

namespace App\Filament\Resources\RecruitmentAnnouncementResource\Pages;

use App\Filament\Resources\RecruitmentAnnouncementResource;
use Filament\Resources\Pages\EditRecord;

class EditRecruitmentAnnouncement extends EditRecord
{
    protected static string $resource = RecruitmentAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

