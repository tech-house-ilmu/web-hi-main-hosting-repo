<?php

use Database\Seeders\LeadersDetailsAboutSeeder;
use Illuminate\Database\Migrations\Migration;
use App\Models\LeadersDetailsAbout;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Pastikan 30 data employee Batch 6 otomatis terisi saat deploy / migrate
        if (LeadersDetailsAbout::count() === 0) {
            (new LeadersDetailsAboutSeeder())->run();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu menghapus data saat rollback migration
    }
};
