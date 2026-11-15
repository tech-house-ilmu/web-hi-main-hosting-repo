<?php

namespace Database\Seeders;

use App\Models\HITCCCategory;
use Illuminate\Database\Seeder;

class HITCCCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Internship', 'slug' => 'internship'],
            ['name' => 'Volunteer', 'slug' => 'volunteer'],
            ['name' => 'Scholarship', 'slug' => 'scholarship'],
            ['name' => 'Exchange', 'slug' => 'exchange'],
            ['name' => 'Competition', 'slug' => 'competition'],
        ];

        foreach ($categories as $category) {
            HITCCCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
