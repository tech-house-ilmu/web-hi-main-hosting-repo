<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'admin',
                'password' => 'tes123',
                'is_admin' => true,
                'role' => User::ROLE_SUPERADMIN,
                'division' => 'Tech',
                'is_active' => true,
            ]
        );
        User::where('email', 'admin@mail.com')->update([
            'is_admin' => true,
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->call([
            DivisionSeeder::class,
            PositionSeeder::class,
            HITCCCategorySeeder::class,
            ExpertSeeder::class,
            TestimoniSeeder::class,
            EventSeeder::class,
            ArticleSeeder::class,
            LeadersDetailsAboutSeeder::class,
            HITCCProgrammeSeeder::class,
        ]);
    }
}
