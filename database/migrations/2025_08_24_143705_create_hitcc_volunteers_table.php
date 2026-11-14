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
        Schema::create('hitcc_volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hitcc_programme_id')
                ->constrained('hitcc_programmes')
                ->cascadeOnDelete();

            // ===== SECTION: Information =====
            $table->string('hitcc_volunteer_type')->nullable();
            $table->string('hitcc_volunteer_volunteer_type')->nullable();
            $table->string('hitcc_volunteer_location')->nullable();
            $table->string('hitcc_volunteer_duration')->nullable();
            $table->text('hitcc_volunteer_program_goals')->nullable();
            $table->text('hitcc_volunteer_benefit')->nullable();

            // ===== SECTION: Jobdesc =====
            $table->longText('hitcc_volunteer_activities')->nullable();
            $table->string('hitcc_volunteer_schedule_times')->nullable();

            // ===== SECTION: Qualification =====
            $table->longText('hitcc_volunteer_qualification_list')->nullable();

            // ===== SECTION: Registration =====
            $table->string('hitcc_volunteer_additional_link')->nullable();

            // ===== SECTION: Additional info =====
            $table->text('hitcc_volunteer_facilities')->nullable();
            $table->longText('hitcc_volunteer_rules')->nullable();
            $table->longText('hitcc_volunteer_detail_information')->nullable();

            $table->timestamps();

            $table->index('hitcc_programme_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_volunteers');
    }
};
