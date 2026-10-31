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
        $scholarshipCat = HITCCCategory::where('slug', 'scholarship')->first();
        $exchangeCat = HITCCCategory::where('slug', 'exchange')->first();
        $competitionCat = HITCCCategory::where('slug', 'competition')->first();

        // Sync sample images to public storage
        $filesToSync = [
            'programmes/logo-cakap.webp' => 'img/homepage/logo-cakap.webp',
            'programmes/internship.webp' => 'img/homepage/img-opp/internship.webp',
            'programmes/logo-pemimpinid.webp' => 'img/homepage/logo-pemimpinid.webp',
            'programmes/volunteer.webp' => 'img/homepage/img-opp/volunteer.webp',
            'programmes/poster-hitcc.webp' => 'img/homepage/poster-HITCC.webp',
        ];

        foreach ($filesToSync as $dest => $src) {
            if (file_exists(public_path($src))) {
                Storage::disk('public')->put($dest, file_get_contents(public_path($src)));
            }
        }

        if ($internshipCat) {
            // Card 1: Product Management Intern (Summer 2025) - directly matches screenshot
            $prog1 = HITCCProgramme::updateOrCreate(
                ['slug' => 'product-management-intern-summer-2025'],
                [
                    'hitcc_category_id' => $internshipCat->id,
                    'title_program' => 'Product Management Intern (Summer 2025)',
                    'company_name' => 'PT Telkom Digital Hub',
                    'logo_company_img' => 'programmes/logo-cakap.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                    'registration_info' => 'Terbuka untuk mahasiswa aktif semester 4-8 semua jurusan.',
                    'registration_deadline' => Carbon::now()->addDays(12),
                    'company_desc' => 'Divisi inovasi digital PT Telkom Indonesia yang fokus pada inkubasi produk digital nasional.',
                    'sort_order' => 1,
                ]
            );

            \App\Models\HITCCInternship::updateOrCreate(
                ['hitcc_programme_id' => $prog1->id],
                [
                    'hitcc_internship_location' => 'Jakarta (Hybrid)',
                    'hitcc_internship_duration' => '3 Bulan',
                    'hitcc_internship_allowance' => 'Paid Internship & Mentoring 1-on-1',
                    'hitcc_internship_position' => 'Product Management',
                    'hitcc_internship_jobdesc_detail' => 'Membantu Product Manager dalam research, wireframing, dan sprint planning produk digital.',
                ]
            );

            // Card 2: Fullstack Web Dev Intern
            $prog2 = HITCCProgramme::updateOrCreate(
                ['slug' => 'tech-intern-house-ilmu'],
                [
                    'hitcc_category_id' => $internshipCat->id,
                    'title_program' => 'Fullstack Web Dev Intern',
                    'company_name' => 'House Ilmu Indonesia',
                    'logo_company_img' => 'programmes/logo-cakap.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://houseilmu.id/career',
                    'registration_info' => 'Terbuka untuk mahasiswa aktif semester 5 ke atas.',
                    'registration_deadline' => Carbon::now()->addDays(18),
                    'company_desc' => 'House Ilmu adalah platform career development dengan impact sosial bagi generasi muda.',
                    'sort_order' => 2,
                ]
            );

            \App\Models\HITCCInternship::updateOrCreate(
                ['hitcc_programme_id' => $prog2->id],
                [
                    'hitcc_internship_location' => 'Remote / WFH',
                    'hitcc_internship_duration' => '3 Bulan',
                    'hitcc_internship_allowance' => 'Paid Internship & Free Mentoring',
                    'hitcc_internship_position' => 'Fullstack Developer',
                    'hitcc_internship_jobdesc_detail' => 'Mengembangkan fitur web platform House Ilmu menggunakan Laravel & Tailwind CSS.',
                ]
            );
        }

        if ($volunteerCat) {
            // Card 3: Youth Leader Volunteer
            $prog3 = HITCCProgramme::updateOrCreate(
                ['slug' => 'volunteer-youth-leader-2026'],
                [
                    'hitcc_category_id' => $volunteerCat->id,
                    'title_program' => 'Youth Leader Volunteer (Batch 4)',
                    'company_name' => 'Pemimpin.id',
                    'logo_company_img' => 'programmes/logo-pemimpinid.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://pemimpin.id',
                    'registration_info' => 'Program relawan kepemudaan nasional.',
                    'registration_deadline' => Carbon::now()->addDays(15),
                    'company_desc' => 'Organisasi nirlaba yang berfokus pada ekosistem kepemimpinan di Indonesia.',
                    'sort_order' => 3,
                ]
            );

            \App\Models\HITCCVolunteer::updateOrCreate(
                ['hitcc_programme_id' => $prog3->id],
                [
                    'hitcc_volunteer_type' => 'Hybrid',
                    'hitcc_volunteer_volunteer_type' => 'Community Development & Leadership',
                    'hitcc_volunteer_location' => 'Jakarta Selatan',
                    'hitcc_volunteer_duration' => '6 Bulan',
                    'hitcc_volunteer_program_goals' => 'Mengembangkan potensi kepemimpinan pemuda Indonesia melalui aksi sosial nyata.',
                ]
            );
        }

        if ($scholarshipCat) {
            // Card 4: Scholarship Opportunity
            $prog4 = HITCCProgramme::updateOrCreate(
                ['slug' => 'beasiswa-prestasi-talenta-digital'],
                [
                    'hitcc_category_id' => $scholarshipCat->id,
                    'title_program' => 'Beasiswa Prestasi Talenta Digital 2026',
                    'company_name' => 'Yayasan Indonesia Cerdas',
                    'logo_company_img' => 'programmes/logo-cakap.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                    'registration_info' => 'Bantuan dana kuliah penuh plus tunjangan bulanan.',
                    'registration_deadline' => Carbon::now()->addDays(20),
                    'company_desc' => 'Program beasiswa pendidikan bagi mahasiswa berprestasi di bidang teknologi dan sains.',
                    'sort_order' => 4,
                ]
            );

            \App\Models\HITCCScholarship::updateOrCreate(
                ['hitcc_programme_id' => $prog4->id],
                [
                    'hitcc_scholarship_scholar_type' => 'Full Scholarship & Allowance',
                    'hitcc_scholarship_program_desc' => 'Biaya UKT penuh sampai lulus dan tunjangan riset skripsi.',
                    'hitcc_scholarship_benefit_scholar' => 'Tunjangan Rp 2.500.000/bulan & Laptop',
                ]
            );
        }

        if ($exchangeCat) {
            // Card 5: Exchange Opportunity
            $prog5 = HITCCProgramme::updateOrCreate(
                ['slug' => 'asean-youth-exchange-program'],
                [
                    'hitcc_category_id' => $exchangeCat->id,
                    'title_program' => 'ASEAN Youth Cultural & Tech Exchange',
                    'company_name' => 'Global Youth Network',
                    'logo_company_img' => 'programmes/logo-pemimpinid.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                    'registration_info' => 'Program pertukaran pemuda ke Tokyo & Kyoto, Jepang.',
                    'registration_deadline' => Carbon::now()->addDays(25),
                    'company_desc' => 'Organisasi pertukaran budaya dan inovasi pemuda se-Asia Tenggara.',
                    'sort_order' => 5,
                ]
            );

            \App\Models\HITCCExchange::updateOrCreate(
                ['hitcc_programme_id' => $prog5->id],
                [
                    'hitcc_exchange_type' => 'Fully Funded',
                    'hitcc_exchange_exchange_type' => 'Short Course & Summit',
                    'hitcc_exchange_location' => 'Tokyo, Jepang',
                    'hitcc_exchange_duration' => '14 Hari',
                ]
            );
        }

        if ($competitionCat) {
            // Card 6: Competition Opportunity
            $prog6 = HITCCProgramme::updateOrCreate(
                ['slug' => 'national-student-ui-ux-hackathon'],
                [
                    'hitcc_category_id' => $competitionCat->id,
                    'title_program' => 'National Student UI/UX & AI Hackathon',
                    'company_name' => 'TechFest Indonesia',
                    'logo_company_img' => 'programmes/logo-cakap.webp',
                    'bg_poster_img' => null,
                    'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                    'registration_info' => 'Kompetisi desain produk & AI tingkat nasional berhadiah total Rp 50 Juta.',
                    'registration_deadline' => Carbon::now()->addDays(8),
                    'company_desc' => 'Ajang festival teknologi dan inovasi mahasiswa terbesar di Indonesia.',
                    'sort_order' => 6,
                ]
            );

            \App\Models\HITCCCompetition::updateOrCreate(
                ['hitcc_programme_id' => $prog6->id],
                [
                    'hitcc_competition_category' => 'Mahasiswa D3/D4/S1',
                    'hitcc_competition_competition_type' => 'UI/UX & AI Product Design',
                    'hitcc_competition_prize' => 'Total Hadiah Rp 50 Juta + Sertifikat',
                    'hitcc_competition_venue' => 'Online & Hybrid Final Jakarta',
                ]
            );
        }
    }
}
