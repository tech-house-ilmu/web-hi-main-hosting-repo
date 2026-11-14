<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $divisions = ['Human Capital', 'Marketing', 'Business Development', 'Technology', 'CEO', 'Product Development'];

        foreach ($divisions as $division) {
            Division::firstOrCreate(
                ['slug' => Str::slug($division)],
                ['name' => $division]
            );
        }
    }
}
