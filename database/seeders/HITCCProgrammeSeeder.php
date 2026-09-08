<?php

namespace Database\Seeders;

use App\Models\HITCCCategory;
use App\Models\HITCCInternship;
use App\Models\HITCCProgramme;
use App\Models\HITCCVolunteer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HITCCProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $internshipCat = HITCCCategory::where('slug', 'internship')->first();
        $volunteerCat = HITCCCategory::where('slug', 'volunteer')->first();

        // Sync sample images to public storage
        $filesToSync = [
            'programmes/logo-cakap.webp' => 'img/homepage/logo-cakap.webp',
            'programmes/internship.webp' => 'img/homepage/img-opp/internship.webp',
            'programmes/logo-pemimpinid.webp' => 'img/homepage/logo-pemimpinid.webp',
            'programmes/volunteer.webp' => 'img/homepage/img-opp/volunteer.webp',
        ];

        foreach ($filesToSync as $dest => $src) {
            if (! Storage::disk('public')->exists($dest) && file_exists(public_path($src))) {
                Storage::disk('public')->put($dest, file_get_contents(public_path($src)));
            }
        }

        if ($internshipCat) {
            $prog1 = HITCCProgramme::updateOrCreate(
                ['slug' => 'tech-intern-house-ilmu'],
                [
                    'hitcc_category_id' => $internshipCat->id,
                    'title_program' => 'Fullstack Web Dev Intern',
                    'company_name' => 'House Ilmu Indonesia',
                    'logo_company_img' => 'programmes/logo-cakap.webp',
                    'bg_poster_img' => 'programmes/internship.webp',
                    'link_apply' => 'https://houseilmu.id/career',
                    'registration_info' => 'Terbuka untuk mahasiswa aktif semester 5 ke atas.',
                    'registration_deadline' => Carbon::now()->addMonths(2),
                    'company_desc' => 'House Ilmu adalah platform career development dengan impact sosial bagi generasi muda.',
                    'sort_order' => 1,
                ]
            );

            HITCCInternship::updateOrCreate(
                ['hitcc_programme_id' => $prog1->id],
                [
                    'hitcc_internship_location' => 'Remote / WFH',
                    'hitcc_internship_duration' => '3 Bulan',
                    'hitcc_internship_allowance' => 'Paid Internship',
                    'hitcc_internship_position' => 'Fullstack Developer',
                    'hitcc_internship_jobdesc_detail' => 'Mengembangkan fitur web platform House Ilmu menggunakan Laravel & Tailwind CSS.',
                ]
            );
        }

        if ($volunteerCat) {
            $prog2 = HITCCProgramme::updateOrCreate(
                ['slug' => 'volunteer-youth-leader-2026'],
                [
                    'hitcc_category_id' => $volunteerCat->id,
                    'title_program' => 'Youth Leader Volunteer',
                    'company_name' => 'Pemimpin.id',
                    'logo_company_img' => 'programmes/logo-pemimpinid.webp',
                    'bg_poster_img' => 'programmes/volunteer.webp',
                    'link_apply' => 'https://pemimpin.id',
                    'registration_info' => 'Program relawan kepemudaan nasional.',
                    'registration_deadline' => Carbon::now()->addMonths(1),
                    'company_desc' => 'Organisasi nirlaba yang berfokus pada ekosistem kepemimpinan di Indonesia.',
                    'sort_order' => 2,
                ]
            );

            HITCCVolunteer::updateOrCreate(
                ['hitcc_programme_id' => $prog2->id],
                [
                    'hitcc_volunteer_type' => 'Social Project',
                    'hitcc_volunteer_volunteer_type' => 'Nasional',
                    'hitcc_volunteer_location' => 'Hybrid Jakarta',
                    'hitcc_volunteer_duration' => '6 Bulan',
                    'hitcc_volunteer_program_goals' => 'Mengembangkan potensi kepemimpinan pemuda Indonesia melalui aksi sosial nyata.',
                ]
            );
        }
    }
}
