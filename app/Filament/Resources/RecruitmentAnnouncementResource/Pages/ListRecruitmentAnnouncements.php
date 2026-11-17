<?php

namespace App\Filament\Resources\RecruitmentAnnouncementResource\Pages;

use App\Filament\Resources\RecruitmentAnnouncementResource;
use App\Models\RecruitmentAnnouncement;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecruitmentAnnouncements extends ListRecords
{
    protected static string $resource = RecruitmentAnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        // Jika sudah ada data, sembunyikan tombol create agar admin fokus mengedit data aktif
        if (RecruitmentAnnouncement::count() > 0) {
            return [];
        }

        return [
            Actions\CreateAction::make(),
        ];
    }
}

