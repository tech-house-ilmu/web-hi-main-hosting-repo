<?php

namespace App\Filament\Resources\HITCCProgrammeResource\Pages;

use App\Filament\Resources\HITCCProgrammeResource;
use App\Models\HITCCCompetition;
use App\Models\HITCCExchange;
use App\Models\HITCCInternship;
use App\Models\HITCCScholarship;
use App\Models\HITCCVolunteer;
use Filament\Resources\Pages\CreateRecord;

class CreateHITCCProgramme extends CreateRecord
{
    protected static string $resource = HITCCProgrammeResource::class;

    protected function afterCreate(): void
    {
        $programme = $this->record; // record induk sudah otomatis dibuat oleh Filament

        // Ambil state form
        $state = $this->form->getState();

        // Simpan field spesifik sesuai kategori
        switch ($programme->hitcc_category_id) {
            case HITCCProgrammeResource::getInternshipId():
                HITCCInternship::create(array_merge($state, [
                    'hitcc_programme_id' => $programme->id,
                ]));
                break;

            case HITCCProgrammeResource::getVolunteerId():
                HITCCVolunteer::create(array_merge($state, [
                    'hitcc_programme_id' => $programme->id,
                ]));
                break;

            case HITCCProgrammeResource::getScholarshipId():
                HITCCScholarship::create(array_merge($state, [
                    'hitcc_programme_id' => $programme->id,
                ]));
                break;

            case HITCCProgrammeResource::getExchangeId():
                HITCCExchange::create(array_merge($state, [
                    'hitcc_programme_id' => $programme->id,
                ]));
                break;

            case HITCCProgrammeResource::getCompetitionId():
                HITCCCompetition::create(array_merge($state, [
                    'hitcc_programme_id' => $programme->id,
                ]));
                break;
        }
    }
}
