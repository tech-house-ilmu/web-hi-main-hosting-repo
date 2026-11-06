<?php

namespace Database\Seeders;

use App\Models\HITCCCategory;
use App\Models\HITCCCompetition;
use App\Models\HITCCExchange;
use App\Models\HITCCInternship;
use App\Models\HITCCProgramme;
use App\Models\HITCCScholarship;
use App\Models\HITCCVolunteer;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        // Clean existing to exactly match the 5 opportunities from design reference
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        HITCCInternship::truncate();
        HITCCVolunteer::truncate();
        HITCCScholarship::truncate();
        HITCCExchange::truncate();
        HITCCCompetition::truncate();
        HITCCProgramme::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Marketing Internship (Magang)
        if ($internshipCat) {
            $prog1 = HITCCProgramme::create([
                'hitcc_category_id' => $internshipCat->id,
                'slug' => 'marketing-internship',
                'title_program' => 'Marketing Internship',
                'company_name' => 'House Ilmu Indonesia',
                'logo_company_img' => 'programmes/logo-cakap.webp',
                'bg_poster_img' => null,
                'link_apply' => 'https://houseilmu.id/career',
                'registration_info' => "Pelajari deskripsi dan persyaratan.\nSiapkan CV serta dokumen pendukung.\nIsi formulir resmi saat pendaftaran dibuka.",
                'registration_deadline' => null,
                'company_desc' => 'Kesempatan belajar mengelola kampanye edukasi dan komunikasi digital bersama tim House Ilmu Indonesia.',
                'company_website' => 'https://houseilmu.id',
                'sort_order' => 1,
            ]);

            HITCCInternship::create([
                'hitcc_programme_id' => $prog1->id,
                'hitcc_internship_location' => 'Hibrida · Indonesia',
                'hitcc_internship_duration' => '3 Bulan',
                'hitcc_internship_allowance' => 'Paid Internship & Mentoring 1-on-1',
                'hitcc_internship_position' => 'Marketing & Digital Communication',
                'hitcc_internship_jobdesc_detail' => 'Peserta akan mengikuti proses pembelajaran terarah, berkolaborasi dengan tim, dan menyelesaikan aktivitas sesuai ruang lingkup kesempatan.',
                'hitcc_internship_technical_non_technical_skills' => "Pelajar, mahasiswa, atau lulusan baru yang relevan\nBerkomitmen mengikuti seluruh rangkaian\nMemiliki minat belajar dan bekerja sama",
                'hitcc_internship_benefit' => "Pengalaman proyek nyata\nPendampingan bersama tim\nSertifikat kontribusi",
            ]);
        }

        // 2. HI Programme Volunteer (Relawan)
        if ($volunteerCat) {
            $prog2 = HITCCProgramme::create([
                'hitcc_category_id' => $volunteerCat->id,
                'slug' => 'hi-programme-volunteer',
                'title_program' => 'HI Programme Volunteer',
                'company_name' => 'House Ilmu Indonesia',
                'logo_company_img' => 'programmes/logo-pemimpinid.webp',
                'bg_poster_img' => null,
                'link_apply' => 'https://houseilmu.id/career',
                'registration_info' => "Pelajari peran dan tanggung jawab relawan.\nLengkapi formulir pendaftaran relawan.\nIkuti sesi orientasi dan pengenalan tim.",
                'registration_deadline' => null,
                'company_desc' => 'Ruang kontribusi bagi anak muda untuk mendukung persiapan dan pelaksanaan program edukatif.',
                'company_website' => 'https://houseilmu.id',
                'sort_order' => 2,
            ]);

            HITCCVolunteer::create([
                'hitcc_programme_id' => $prog2->id,
                'hitcc_volunteer_type' => 'Hybrid',
                'hitcc_volunteer_volunteer_type' => 'Community & Program Officer',
                'hitcc_volunteer_location' => 'Hibrida · Indonesia',
                'hitcc_volunteer_duration' => '6 Bulan',
                'hitcc_volunteer_program_goals' => 'Terlibat langsung dalam operasional komunitas, koordinasi kegiatan belajar, dan pendampingan peserta program.',
                'hitcc_volunteer_qualification_list' => "Pemuda berusia 18-25 tahun\nMemiliki kepedulian terhadap dunia pendidikan\nMampu berkomunikasi dan bekerja dalam tim",
                'hitcc_volunteer_benefit' => "Pengalaman kepemimpinan komunitas\nJaringan relawan nasional\nSertifikat kontribusi resmi",
            ]);
        }

        // 3. Future Leaders Scholarship (Beasiswa)
        if ($scholarshipCat) {
            $prog3 = HITCCProgramme::create([
                'hitcc_category_id' => $scholarshipCat->id,
                'slug' => 'future-leaders-scholarship',
                'title_program' => 'Future Leaders Scholarship',
                'company_name' => 'House Ilmu Indonesia',
                'logo_company_img' => 'programmes/logo-cakap.webp',
                'bg_poster_img' => null,
                'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                'registration_info' => "Siapkan transkrip nilai dan berkas pendukung.\nLengkapi esai motivasi diri.\nKirim formulir melalui portal beasiswa resmi.",
                'registration_deadline' => null,
                'company_desc' => 'Kurasi peluang beasiswa untuk mendukung pendidikan dan pengembangan kepemimpinan generasi muda.',
                'company_website' => 'https://houseilmu.id',
                'sort_order' => 3,
            ]);

            HITCCScholarship::create([
                'hitcc_programme_id' => $prog3->id,
                'hitcc_scholarship_scholar_type' => 'Bantuan Pendidikan & Mentoring',
                'hitcc_scholarship_program_desc' => 'Program pembinaan berkesinambungan melalui bantuan finansial pendidikan dan bimbingan mentor berpengalaman.',
                'hitcc_scholarship_requirements_scholar' => "Mahasiswa aktif jenjang D3/D4/S1 seluruh jurusan\nMemiliki komitmen belajar tinggi\nBerperan aktif dalam kegiatan sosial atau kampus",
                'hitcc_scholarship_benefit_scholar' => "Bantuan dana pendidikan per semester\nSesi mentoring kepemimpinan eksklusif\nJaringan penerima beasiswa nasional",
            ]);
        }

        // 4. Student Exchange Programme (Pertukaran)
        if ($exchangeCat) {
            $prog4 = HITCCProgramme::create([
                'hitcc_category_id' => $exchangeCat->id,
                'slug' => 'student-exchange-programme',
                'title_program' => 'Student Exchange Programme',
                'company_name' => 'House Ilmu Indonesia',
                'logo_company_img' => 'programmes/logo-pemimpinid.webp',
                'bg_poster_img' => null,
                'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                'registration_info' => "Konsultasikan rencana studi dengan jurusan.\nSiapkan sertifikat kecakapan bahasa dan paspor.\nIkuti proses seleksi berkas dan wawancara.",
                'registration_deadline' => null,
                'company_desc' => 'Program pertukaran pelajar untuk memperluas perspektif global dan pengalaman lintas budaya.',
                'company_website' => 'https://houseilmu.id',
                'sort_order' => 4,
            ]);

            HITCCExchange::create([
                'hitcc_programme_id' => $prog4->id,
                'hitcc_exchange_type' => 'Fully Funded',
                'hitcc_exchange_exchange_type' => 'International Student Exchange',
                'hitcc_exchange_location' => 'Luring · Luar Negeri',
                'hitcc_exchange_duration' => '1 Semester',
                'hitcc_exchange_program_desc' => 'Kesempatan emas untuk belajar di institusi mitra, membangun jejaring global, dan mengenalkan budaya Indonesia.',
                'hitcc_exchange_selection_criteria' => "Mahasiswa aktif semester 3 hingga 6\nKemampuan komunikasi bahasa Inggris yang baik\nSurat rekomendasi dari perguruan tinggi",
                'hitcc_exchange_benefit' => "Pengalaman studi akademik bertaraf global\nKonversi nilai/SKS perkuliahan\nJejaring persahabatan internasional",
            ]);
        }

        // 5. Youth Innovation Competition (Kompetisi)
        if ($competitionCat) {
            $prog5 = HITCCProgramme::create([
                'hitcc_category_id' => $competitionCat->id,
                'slug' => 'youth-innovation-competition',
                'title_program' => 'Youth Innovation Competition',
                'company_name' => 'House Ilmu Indonesia',
                'logo_company_img' => 'programmes/logo-cakap.webp',
                'bg_poster_img' => null,
                'link_apply' => 'https://houseilmu.id/programme/HI-opportunities',
                'registration_info' => "Bentuk tim inovasi 2-4 orang.\nUnduh panduan resmi dan pelajari tema studi kasus.\nKirimkan berkas proposal ide sebelum batas akhir.",
                'registration_deadline' => null,
                'company_desc' => 'Ajang kompetisi inovasi pemuda untuk mengasah ide kreatif, keterampilan problem solving, dan karya berdampak.',
                'company_website' => 'https://houseilmu.id',
                'sort_order' => 5,
            ]);

            HITCCCompetition::create([
                'hitcc_programme_id' => $prog5->id,
                'hitcc_competition_category' => 'Mahasiswa & Pemuda 18-25 Tahun',
                'hitcc_competition_competition_type' => 'Social Innovation & Tech Idea',
                'hitcc_competition_prize' => "Total hadiah pembinaan dan sertifikat juara\nFeedback langsung dari dewan juri ahli\nPublikasi karya inovasi terpilih",
                'hitcc_competition_venue' => 'Hibrida · Indonesia',
                'hitcc_competition_program_goals' => 'Wadah kompetisi solutif untuk memecahkan tantangan nyata di bidang sosial, edukasi, dan teknologi masa depan.',
                'hitcc_competition_other_requirements' => "Tim beranggotakan 2 hingga 4 pemuda\nTerbuka untuk pelajar dan mahasiswa aktif\nKarya orisinil dan belum pernah memenangkan kompetisi sejenis",
            ]);
        }
    }
}
