<?php

namespace App\Filament\Resources\RecruitmentAnnouncementResource\Pages;

use App\Filament\Resources\RecruitmentAnnouncementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRecruitmentAnnouncement extends CreateRecord
{
    protected static string $resource = RecruitmentAnnouncementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

