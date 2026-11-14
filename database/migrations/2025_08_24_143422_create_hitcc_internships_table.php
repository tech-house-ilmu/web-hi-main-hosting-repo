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
        Schema::create('hitcc_internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hitcc_programme_id')
                ->constrained('hitcc_programmes')
                ->cascadeOnDelete();

            // ===== SECTION: Information =====
            $table->string('hitcc_internship_location')->nullable();
            $table->string('hitcc_internship_duration')->nullable();
            $table->string('hitcc_internship_allowance')->nullable();

            // ===== SECTION: Jobdesc =====
            $table->text('hitcc_internship_jobdesc_detail')->nullable();
            $table->string('hitcc_internship_position')->nullable();
            $table->string('hitcc_internship_salary')->nullable();
            $table->text('hitcc_internship_benefit')->nullable();

            // ===== SECTION: Qualification =====
            $table->string('hitcc_internship_education')->nullable();
            $table->string('hitcc_internship_major')->nullable();
            $table->string('hitcc_internship_gpa')->nullable();
            $table->string('hitcc_internship_language')->nullable();
            $table->text('hitcc_internship_technical_non_technical_skills')->nullable();

            // ===== SECTION: Registration =====
            $table->text('hitcc_internship_documents')->nullable();
            $table->string('hitcc_internship_contact')->nullable();

            // ===== SECTION: Additional info =====
            $table->text('hitcc_internship_facilities')->nullable();
            $table->string('hitcc_internship_work_hours')->nullable();
            $table->text('hitcc_internship_rules')->nullable();
            $table->text('hitcc_internship_detail_information')->nullable();

            $table->timestamps();

            $table->index('hitcc_programme_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_internships');
    }
};
