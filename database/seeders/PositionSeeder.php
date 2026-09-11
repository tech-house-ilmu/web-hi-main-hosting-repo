<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            'CEO' => [
                ['title' => 'Staff Details', 'job_description' => 'Support CEO in strategic planning and operations.', 'requirements' => 'Bachelor degree, leadership skills, 1+ year experience.'],
            ],
            'Product Development' => [
                ['title' => 'Head of Educational Associate', 'job_description' => 'Lead educational product development.', 'requirements' => 'Experience in education, product management skills.'],
                ['title' => 'Staff Educational Associate', 'job_description' => 'Develop educational content and curriculum.', 'requirements' => 'Bachelor degree in education or related field.'],
                ['title' => 'Staff Event Management', 'job_description' => 'Plan and execute events.', 'requirements' => 'Event management experience, organizational skills.'],
            ],
            'Business Development' => [
                ['title' => 'Head of RnD', 'job_description' => 'Lead research and development initiatives.', 'requirements' => 'Research experience, analytical skills.'],
                ['title' => 'Head of Fundraising', 'job_description' => 'Manage fundraising campaigns.', 'requirements' => 'Fundraising experience, communication skills.'],
                ['title' => 'Staff RnD', 'job_description' => 'Conduct research and analysis.', 'requirements' => 'Bachelor degree, research skills.'],
                ['title' => 'Staff Fundraising', 'job_description' => 'Support fundraising activities.', 'requirements' => 'Good communication, team player.'],
            ],
            'Technology' => [
                ['title' => 'Staff Web Development', 'job_description' => 'Develop and maintain website.', 'requirements' => 'PHP, Laravel, JavaScript skills.'],
            ],
            'Marketing' => [
                ['title' => 'Vice Details', 'job_description' => 'Assist marketing team in campaign execution.', 'requirements' => 'Marketing knowledge, creative thinking.'],
                ['title' => 'Staff Content Marketing', 'job_description' => 'Create marketing content.', 'requirements' => 'Content creation skills, social media knowledge.'],
                ['title' => 'Staff Copywriting', 'job_description' => 'Write copy for marketing materials.', 'requirements' => 'Copywriting skills, creativity.'],
                ['title' => 'Staff Graphic Design', 'job_description' => 'Design marketing visuals.', 'requirements' => 'Adobe Creative Suite, design skills.'],
                ['title' => 'Staff Partnership', 'job_description' => 'Manage partner relationships.', 'requirements' => 'Communication skills, networking.'],
                ['title' => 'Staff Talent Management', 'job_description' => 'Recruit and manage talents.', 'requirements' => 'HR knowledge, people skills.'],
            ],
            'Human Capital' => [
                ['title' => 'Staff Human Capital Organization', 'job_description' => 'Manage organizational development.', 'requirements' => 'HR degree, organizational skills.'],
                ['title' => 'Staff Human Capital System', 'job_description' => 'Manage HR systems.', 'requirements' => 'HRIS knowledge, system management.'],
                ['title' => 'Staff Talent Acquisition', 'job_description' => 'Handle recruitment.', 'requirements' => 'Recruitment experience, interviewing skills.'],
            ],
        ];

        foreach ($positions as $divisionName => $divisionPositions) {
            $division = Division::where('name', $divisionName)->first();
            if (!$division) continue;

            foreach ($divisionPositions as $position) {
                Position::firstOrCreate(
                    ['slug' => \Illuminate\Support\Str::slug($position['title']), 'division_id' => $division->id],
                    [
                        'title' => $position['title'],
                        'job_description' => $position['job_description'],
                        'requirements' => $position['requirements'],
                        'apply_link' => 'https://bit.ly/careerHI',
                        'is_visible' => true,
                    ]
                );
            }
        }
    }
}
