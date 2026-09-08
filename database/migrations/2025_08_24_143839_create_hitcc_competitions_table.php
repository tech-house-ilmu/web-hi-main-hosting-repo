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
        Schema::create('hitcc_competitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hitcc_programme_id')
                ->constrained('hitcc_programmes')
                ->cascadeOnDelete();

            // ===== SECTION: Information =====
            $table->text('hitcc_competition_program_goals')->nullable();
            $table->string('hitcc_competition_category')->nullable();
            $table->string('hitcc_competition_competition_type')->nullable();
            $table->string('hitcc_competition_prize')->nullable();

            // ===== SECTION: Requirements =====
            $table->text('hitcc_competition_max_age')->nullable();
            $table->text('hitcc_competition_minimal_education')->nullable();
            $table->text('hitcc_competition_other_requirements')->nullable();

            // ===== SECTION: Registration =====
            $table->string('hitcc_competition_fee_type')->nullable();
            $table->string('hitcc_competition_venue')->nullable();
            $table->text('hitcc_competition_timeline')->nullable();
            $table->string('hitcc_competition_announcement')->nullable();

            // ===== SECTION: Additional info =====
            $table->text('hitcc_competition_rules')->nullable();
            $table->text('hitcc_competition_jury')->nullable();
            $table->text('hitcc_competition_terms_condition')->nullable();

            $table->timestamps();

            $table->index('hitcc_programme_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_competitions');
    }
};
