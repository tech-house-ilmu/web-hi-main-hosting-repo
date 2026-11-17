<?php

namespace App\Filament\Resources\HITCCProgrammeResource\Pages;

use App\Filament\Resources\HITCCProgrammeResource;
use App\Models\HITCCCompetition;
use App\Models\HITCCExchange;
use App\Models\HITCCInternship;
use App\Models\HITCCProgramme;
use App\Models\HITCCScholarship;
use App\Models\HITCCVolunteer;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditHITCCProgramme extends EditRecord
{
    protected static string $resource = HITCCProgrammeResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $programme = $this->record;

        // Ambil data field spesifik kategori
        switch ($programme->hitcc_category_id) {
            case HITCCProgrammeResource::getInternshipId():
                $specific = HITCCInternship::where('hitcc_programme_id', $programme->id)->first()?->toArray() ?? [];
                break;
            case HITCCProgrammeResource::getVolunteerId():
                $specific = HITCCVolunteer::where('hitcc_programme_id', $programme->id)->first()?->toArray() ?? [];
                break;
            case HITCCProgrammeResource::getScholarshipId():
                $specific = HITCCScholarship::where('hitcc_programme_id', $programme->id)->first()?->toArray() ?? [];
                break;
            case HITCCProgrammeResource::getExchangeId():
                $specific = HITCCExchange::where('hitcc_programme_id', $programme->id)->first()?->toArray() ?? [];
                break;
            case HITCCProgrammeResource::getCompetitionId():
                $specific = HITCCCompetition::where('hitcc_programme_id', $programme->id)->first()?->toArray() ?? [];
                break;
            default:
                $specific = [];
        }

        // **Revisi aman FileUpload**
        // Hilangkan sementara field gambar dari $specific supaya Filament tidak stuck loading preview
        $logo = $specific['logo_company_img'] ?? null;
        $poster = $specific['bg_poster_img'] ?? null;
        unset($specific['logo_company_img'], $specific['bg_poster_img']);

        $merged = array_merge($data, $specific);

        // Masukkan URL lama ke state FileUpload agar preview tetap muncul
        if ($logo) {
            $merged['logo_company_img'] = $logo;
        }
        if ($poster) {
            $merged['bg_poster_img'] = $poster;
        }

        return $merged;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $programme = $this->record;

        // SLUG CUSTOM
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_program']).'-'.uniqid();
        } else {
            $existing = HITCCProgramme::where('slug', $data['slug'])
                ->where('id', '!=', $programme->id)
                ->first();
            if ($existing) {
                $data['slug'] .= '-'.uniqid();
            }
        }

        // Update field spesifik sesuai kategori
        switch ($data['hitcc_category_id']) {
            case HITCCProgrammeResource::getInternshipId():
                HITCCInternship::updateOrCreate(
                    ['hitcc_programme_id' => $programme->id],
                    [
                        'hitcc_internship_location' => $data['hitcc_internship_location'] ?? null,
                        'hitcc_internship_duration' => $data['hitcc_internship_duration'] ?? null,
                        'hitcc_internship_allowance' => $data['hitcc_internship_allowance'] ?? null,
                        'hitcc_internship_education' => $data['hitcc_internship_education'] ?? null,
                        'hitcc_internship_major' => $data['hitcc_internship_major'] ?? null,
                        'hitcc_internship_position' => $data['hitcc_internship_position'] ?? null,
                        'hitcc_internship_salary' => $data['hitcc_internship_salary'] ?? null,
                        'hitcc_internship_benefit' => $data['hitcc_internship_benefit'] ?? null,
                        'hitcc_internship_contact' => $data['hitcc_internship_contact'] ?? null,
                        'hitcc_internship_documents' => $data['hitcc_internship_documents'] ?? null,
                        'hitcc_internship_gpa' => $data['hitcc_internship_gpa'] ?? null,
                        'hitcc_internship_language' => $data['hitcc_internship_language'] ?? null,
                        'hitcc_internship_facilities' => $data['hitcc_internship_facilities'] ?? null,
                        'hitcc_internship_rules' => $data['hitcc_internship_rules'] ?? null,
                        'hitcc_internship_detail_information' => $data['hitcc_internship_detail_information'] ?? null,
                        'hitcc_internship_technical_non_technical_skills' => $data['hitcc_internship_technical_non_technical_skills'] ?? null,
                        'hitcc_internship_jobdesc_detail' => $data['hitcc_internship_jobdesc_detail'] ?? null,
                        'hitcc_internship_work_hours' => $data['hitcc_internship_work_hours'] ?? null,
                        'logo_company_img' => $data['logo_company_img'] ?? $programme->logo_company_img,
                        'bg_poster_img' => $data['bg_poster_img'] ?? $programme->bg_poster_img,
                    ]
                );
                break;

            case HITCCProgrammeResource::getVolunteerId():
                HITCCVolunteer::updateOrCreate(
                    ['hitcc_programme_id' => $programme->id],
                    [
                        'hitcc_volunteer_activities' => $data['hitcc_volunteer_activities'] ?? null,
                        'hitcc_volunteer_schedule_times' => $data['hitcc_volunteer_schedule_times'] ?? null,
                        'hitcc_volunteer_qualification_list' => $data['hitcc_volunteer_qualification_list'] ?? null,
                        'hitcc_volunteer_program_goals' => $data['hitcc_volunteer_program_goals'] ?? null,
                        'hitcc_volunteer_location' => $data['hitcc_volunteer_location'] ?? null,
                        'hitcc_volunteer_type' => $data['hitcc_volunteer_type'] ?? null,
                        'hitcc_volunteer_volunteer_type' => $data['hitcc_volunteer_volunteer_type'] ?? null,
                        'hitcc_volunteer_duration' => $data['hitcc_volunteer_duration'] ?? null,
                        'hitcc_volunteer_benefit' => $data['hitcc_volunteer_benefit'] ?? null,
                        'hitcc_volunteer_additional_link' => $data['hitcc_volunteer_additional_link'] ?? null,
                        'hitcc_volunteer_facilities' => $data['hitcc_volunteer_facilities'] ?? null,
                        'hitcc_volunteer_rules' => $data['hitcc_volunteer_rules'] ?? null,
                        'hitcc_volunteer_detail_information' => $data['hitcc_volunteer_detail_information'] ?? null,
                    ]
                );
                break;

            case HITCCProgrammeResource::getScholarshipId():
                HITCCScholarship::updateOrCreate(
                    ['hitcc_programme_id' => $programme->id],
                    [
                        'hitcc_scholarship_program_desc' => $data['hitcc_scholarship_program_desc'] ?? null,
                        'hitcc_scholarship_scholar_type' => $data['hitcc_scholarship_scholar_type'] ?? null,
                        'hitcc_scholarship_requirements_scholar' => $data['hitcc_scholarship_requirements_scholar'] ?? null,
                        'hitcc_scholarship_commitment_fee' => $data['hitcc_scholarship_commitment_fee'] ?? null,
                        'hitcc_scholarship_benefit_scholar' => $data['hitcc_scholarship_benefit_scholar'] ?? null,
                        'hitcc_scholarship_company_details' => $data['hitcc_scholarship_company_details'] ?? null,
                        'hitcc_scholarship_costs_covered' => $data['hitcc_scholarship_costs_covered'] ?? null,
                        'hitcc_scholarship_selection_phase' => $data['hitcc_scholarship_selection_phase'] ?? null,
                        'hitcc_scholarship_guidebook' => $data['hitcc_scholarship_guidebook'] ?? null,
                        'hitcc_scholarship_deadline' => $data['hitcc_scholarship_deadline'] ?? null,
                        'hitcc_scholarship_documents' => $data['hitcc_scholarship_documents'] ?? null,
                    ]
                );
                break;

            case HITCCProgrammeResource::getExchangeId():
                HITCCExchange::updateOrCreate(
                    ['hitcc_programme_id' => $programme->id],
                    [
                        'hitcc_exchange_location' => $data['hitcc_exchange_location'] ?? null,
                        'hitcc_exchange_duration' => $data['hitcc_exchange_duration'] ?? null,
                        'hitcc_exchange_program_desc' => $data['hitcc_exchange_program_desc'] ?? null,
                        'hitcc_exchange_type' => $data['hitcc_exchange_type'] ?? null,
                        'hitcc_exchange_exchange_type' => $data['hitcc_exchange_exchange_type'] ?? null,
                        'hitcc_exchange_minimal_education' => $data['hitcc_exchange_minimal_education'] ?? null,
                        'hitcc_exchange_max_age' => $data['hitcc_exchange_max_age'] ?? null,
                        'hitcc_exchange_relevant_experience' => $data['hitcc_exchange_relevant_experience'] ?? null,
                        'hitcc_exchange_benefit' => $data['hitcc_exchange_benefit'] ?? null,
                        'hitcc_exchange_gpa' => $data['hitcc_exchange_gpa'] ?? null,
                        'hitcc_exchange_documents' => $data['hitcc_exchange_documents'] ?? null,
                        'hitcc_exchange_registration_fee' => $data['hitcc_exchange_registration_fee'] ?? null,
                        'hitcc_exchange_selection_criteria' => $data['hitcc_exchange_selection_criteria'] ?? null,
                        'hitcc_exchange_accomodation' => $data['hitcc_exchange_accomodation'] ?? null,
                        'hitcc_exchange_facilities' => $data['hitcc_exchange_facilities'] ?? null,
                        'hitcc_exchange_rules' => $data['hitcc_exchange_rules'] ?? null,
                        'hitcc_exchange_detail_information' => $data['hitcc_exchange_detail_information'] ?? null,
                    ]
                );
                break;

            case HITCCProgrammeResource::getCompetitionId():
                HITCCCompetition::updateOrCreate(
                    ['hitcc_programme_id' => $programme->id],
                    [
                        'hitcc_competition_category' => $data['hitcc_competition_category'] ?? null,
                        'hitcc_competition_program_goals' => $data['hitcc_competition_program_goals'] ?? null,
                        'hitcc_competition_max_age' => $data['hitcc_competition_max_age'] ?? null,
                        'hitcc_competition_prize' => $data['hitcc_competition_prize'] ?? null,
                        'hitcc_competition_competition_type' => $data['hitcc_competition_competition_type'] ?? null,
                        'hitcc_competition_venue' => $data['hitcc_competition_venue'] ?? null,
                        'hitcc_competition_minimal_education' => $data['hitcc_competition_minimal_education'] ?? null,
                        'hitcc_competition_announcement' => $data['hitcc_competition_announcement'] ?? null,
                        'hitcc_competition_other_requirements' => $data['hitcc_competition_other_requirements'] ?? null,
                        'hitcc_competition_fee_type' => $data['hitcc_competition_fee_type'] ?? null,
                        'hitcc_competition_jury' => $data['hitcc_competition_jury'] ?? null,
                        'hitcc_competition_timeline' => $data['hitcc_competition_timeline'] ?? null,
                        'hitcc_competition_rules' => $data['hitcc_competition_rules'] ?? null,
                        'hitcc_competition_terms_condition' => $data['hitcc_competition_terms_condition'] ?? null,
                    ]
                );
                break;
        }

        return $data;
    }
}
