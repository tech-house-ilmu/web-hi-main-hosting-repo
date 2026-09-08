<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hitcc_scholarships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hitcc_programme_id')
                ->constrained('hitcc_programmes')
                ->cascadeOnDelete();

            // ===== SECTION: Information =====
            $table->text('hitcc_scholarship_program_desc')->nullable();
            $table->string('hitcc_scholarship_scholar_type')->nullable();
            $table->string('hitcc_scholarship_deadline')->nullable();

            // ===== SECTION: Requirements =====
            $table->text('hitcc_scholarship_requirements_scholar')->nullable();

            // ===== SECTION: Benefit =====
            $table->text('hitcc_scholarship_benefit_scholar')->nullable();

            // ===== SECTION: Registration =====
            $table->text('hitcc_scholarship_documents')->nullable();

            // ===== SECTION: Additional info =====
            $table->text('hitcc_scholarship_company_details')->nullable();
            $table->text('hitcc_scholarship_commitment_fee')->nullable();
            $table->text('hitcc_scholarship_costs_covered')->nullable();
            $table->text('hitcc_scholarship_selection_phase')->nullable();
            $table->string('hitcc_scholarship_guidebook')->nullable();

            $table->timestamps();

            $table->index('hitcc_programme_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_scholarships');
    }
};
