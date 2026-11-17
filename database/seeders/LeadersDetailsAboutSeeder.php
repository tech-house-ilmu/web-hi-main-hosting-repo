<?php

namespace Database\Seeders;

use App\Models\LeadersDetailsAbout;
use Illuminate\Database\Seeder;

class LeadersDetailsAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            // ==========================================
            // 1. CEO Office (4 members)
            // ==========================================
            [
                'leaders_details_name' => 'Lutfia Rahmannisa',
                'leaders_details_position' => 'CEO HI',
                'leaders_details_position_division' => 'CEO Office',
                'leaders_details_sub_division' => null,
                'leaders_details_img' => 'team/lutfia-rahmannisa.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'nisalutfia28@gmail.com',
                'order' => 1,
            ],
            [
                'leaders_details_name' => 'Maulidiya Navy Putri Pamuji',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'CEO Office',
                'leaders_details_sub_division' => 'Ceo Management',
                'leaders_details_img' => 'team/maulidiya-navy-putri-pamuji.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'Maulidiyaapamujii@gmail.com',
                'order' => 2,
            ],
            [
                'leaders_details_name' => 'Moh Rizky FItriansyah',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'CEO Office',
                'leaders_details_sub_division' => 'Ceo Management',
                'leaders_details_img' => 'team/moh-rizky-fitriansyah.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'rizkyfitrian21@gmail.com',
                'order' => 3,
            ],
            [
                'leaders_details_name' => "Asma Muthma'inah",
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'CEO Office',
                'leaders_details_sub_division' => 'General Affair',
                'leaders_details_img' => 'team/asma-muthma-inah.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'muthmainah322@gmail.com',
                'order' => 4,
            ],

            // ==========================================
            // 2. Human Capital (10 members)
            // ==========================================
            [
                'leaders_details_name' => 'Daffa Abid Alzain',
                'leaders_details_position' => 'Vice President',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => null,
                'leaders_details_img' => 'team/daffa-abid-alzain.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'daffaabidzainhr@gmail.com',
                'order' => 10,
            ],
            [
                'leaders_details_name' => 'Vinesa Ardathien Dami',
                'leaders_details_position' => 'Head of',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital Organization',
                'leaders_details_img' => 'team/vinesa-ardathien-dami.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'vinesaar17@gmail.com',
                'order' => 11,
            ],
            [
                'leaders_details_name' => 'Siti Khalifa Nurrisvi Zauza',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital Organization',
                'leaders_details_img' => 'team/siti-khalifa-nurrisvi-zauza.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'siti.k.n.zauza@gmail.com',
                'order' => 12,
            ],
            [
                'leaders_details_name' => 'Nurhaliza Nitswat',
                'leaders_details_position' => 'Head of',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital System & Development',
                'leaders_details_img' => 'team/nurhaliza-nitswat.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'nurhalizanitswat0706@gmail.com',
                'order' => 13,
            ],
            [
                'leaders_details_name' => 'Nur Astiana Hidayat Ardi',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital System & Development',
                'leaders_details_img' => 'team/nur-astiana-hidayat-ardi.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'nurastiana024@gmail.com',
                'order' => 14,
            ],
            [
                'leaders_details_name' => 'Helen Lovita Azzahra',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital System & Development',
                'leaders_details_img' => 'team/helen-lovita-azzahra.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'helenlovita804@gmail.com',
                'order' => 15,
            ],
            [
                'leaders_details_name' => 'Muhammad Fadil',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Human Capital System & Development',
                'leaders_details_img' => 'team/muhammad-fadil.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'muhammadfadil6467373@gmail.com',
                'order' => 16,
            ],
            [
                'leaders_details_name' => 'Muchammad Adam Wildan',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Talent Acquisition',
                'leaders_details_img' => 'team/muchammad-adam-wildan.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'wildanadam011@gmail.com',
                'order' => 17,
            ],
            [
                'leaders_details_name' => 'Adelia Selsa Hardiana',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Talent Acquisition',
                'leaders_details_img' => 'team/adelia-selsa-hardiana.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'selsahardiana12@gmail.com',
                'order' => 18,
            ],
            [
                'leaders_details_name' => 'Agus Tri Setyowati',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Human Capital',
                'leaders_details_sub_division' => 'Talent Acquisition',
                'leaders_details_img' => 'team/agus-tri-setyowati.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'agustri32759@gmail.com',
                'order' => 19,
            ],

            // ==========================================
            // 3. Business Development (6 members)
            // ==========================================
            [
                'leaders_details_name' => 'Khoirnurey Mustofa Ghorizah',
                'leaders_details_position' => 'Vice President',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => null,
                'leaders_details_img' => 'team/khoirnurey-mustofa-ghorizah.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'ghorizahkhoir@gmail.com',
                'order' => 30,
            ],
            [
                'leaders_details_name' => 'Amela Salwa Fransisca',
                'leaders_details_position' => 'Head of',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => 'Partnership',
                'leaders_details_img' => 'team/amela-salwa-fransisca.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'franziennevaleriaelle@gmail.com',
                'order' => 31,
            ],
            [
                'leaders_details_name' => 'Muhamad Ariq Numan',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => 'Partnership',
                'leaders_details_img' => 'team/muhamad-ariq-numan.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'muhariqnuman@gmail.com',
                'order' => 32,
            ],
            [
                'leaders_details_name' => 'Febrisa Rahmayanti Pangaribuan',
                'leaders_details_position' => 'Head of',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => 'Business Analyst',
                'leaders_details_img' => 'team/febrisa-rahmayanti-pangaribuan.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'febrisarpangaribuan@gmail.com',
                'order' => 33,
            ],
            [
                'leaders_details_name' => 'Alief Damarjati Sulistyodi',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => 'Business Analyst',
                'leaders_details_img' => 'team/alief-damarjati-sulistyodi.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'aliefdamarjatisulistyodi@gmail.com',
                'order' => 34,
            ],
            [
                'leaders_details_name' => 'Salsabila Ramadhani',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Business Development',
                'leaders_details_sub_division' => 'Business Analyst',
                'leaders_details_img' => 'team/salsabila-ramadhani.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'salsabila.ramadhani817@gmail.com',
                'order' => 35,
            ],

            // ==========================================
            // 4. Marketing (6 members)
            // ==========================================
            [
                'leaders_details_name' => 'Flora Tampubolon',
                'leaders_details_position' => 'Vice President',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => null,
                'leaders_details_img' => 'team/flora-tampubolon.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'floratampubolon3@gmail.com',
                'order' => 40,
            ],
            [
                'leaders_details_name' => 'M. Caesar Febriano Sudarno',
                'leaders_details_position' => 'Head of',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => 'Digital Marketing',
                'leaders_details_img' => 'team/m-caesar-febriano-sudarno.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'caesarfebriano23@gmail.com',
                'order' => 41,
            ],
            [
                'leaders_details_name' => 'Shinta Miranda Sijabat',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => 'Social Media Specialist',
                'leaders_details_img' => 'team/shinta-miranda-sijabat.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'shintamirandasijabat@gmail.com',
                'order' => 42,
            ],
            [
                'leaders_details_name' => 'Candy Remine Zendrato',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => 'Copywriter',
                'leaders_details_img' => 'team/candy-remine-zendrato.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'reminezendrato08@gmail.com',
                'order' => 43,
            ],
            [
                'leaders_details_name' => 'Nasywa Salsabila Nur Ilham',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => 'Copywriter',
                'leaders_details_img' => 'team/nasywa-salsabila-nur-ilham.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'nasywasalsabilani@gmail.com',
                'order' => 44,
            ],
            [
                'leaders_details_name' => 'Elfaruzz Rasyid',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Marketing',
                'leaders_details_sub_division' => 'Talent Management',
                'leaders_details_img' => 'team/elfaruzz-rasyid.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'elvorasyid@gmail.com',
                'order' => 45,
            ],

            // ==========================================
            // 5. Technology (4 members)
            // ==========================================
            [
                'leaders_details_name' => 'Aiko Hanako Lasut',
                'leaders_details_position' => 'Vice President',
                'leaders_details_position_division' => 'Technology',
                'leaders_details_sub_division' => null,
                'leaders_details_img' => 'team/aiko-hanako-lasut.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'Aikohanako.organisasi@gmail.com',
                'order' => 50,
            ],
            [
                'leaders_details_name' => 'Prosafana Atmaditjepta Venusa',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Technology',
                'leaders_details_sub_division' => 'Web Development',
                'leaders_details_img' => 'team/prosafana-atmaditjepta-venusa.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'cacaprosafana@gmail.com',
                'order' => 51,
            ],
            [
                'leaders_details_name' => 'Robbin Chandra Falla Arya Ardhana',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Technology',
                'leaders_details_sub_division' => 'Web Development',
                'leaders_details_img' => 'team/robbin-chandra-falla-arya-ardhana.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'robbincfa@gmail.com',
                'order' => 52,
            ],
            [
                'leaders_details_name' => 'Rizkya Ramdan',
                'leaders_details_position' => 'Staff',
                'leaders_details_position_division' => 'Technology',
                'leaders_details_sub_division' => 'Web Development',
                'leaders_details_img' => 'team/rizkya-ramdan.jpg',
                'leaders_details_linkedin' => null,
                'leaders_details_email' => 'rizkyaramdancringe@gmail.com',
                'order' => 53,
            ],
        ];

        // Clear existing records and insert Batch 6 employees
        LeadersDetailsAbout::truncate();

        foreach ($employees as $employee) {
            LeadersDetailsAbout::create($employee);
        }
    }
}
