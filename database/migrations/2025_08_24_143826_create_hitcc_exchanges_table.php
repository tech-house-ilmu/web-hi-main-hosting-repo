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
        Schema::create('hitcc_exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hitcc_programme_id')
                ->constrained('hitcc_programmes')
                ->cascadeOnDelete();

            // ===== SECTION: Information =====
            $table->text('hitcc_exchange_program_desc')->nullable();
            $table->string('hitcc_exchange_location')->nullable();
            $table->string('hitcc_exchange_duration')->nullable();
            $table->string('hitcc_exchange_type')->nullable();
            $table->string('hitcc_exchange_exchange_type')->nullable();
            $table->text('hitcc_exchange_benefit')->nullable();

            // ===== SECTION: Requirements =====
            $table->string('hitcc_exchange_minimal_education')->nullable();
            $table->string('hitcc_exchange_max_age')->nullable();
            $table->string('hitcc_exchange_gpa')->nullable();
            $table->text('hitcc_exchange_relevant_experience')->nullable();

            // ===== SECTION: Seletion Criteria =====
            $table->text('hitcc_exchange_selection_criteria')->nullable();

            // ===== SECTION: Registration =====
            $table->text('hitcc_exchange_documents')->nullable();
            $table->string('hitcc_exchange_registration_fee')->nullable();

            // ===== SECTION: Additional info =====
            $table->text('hitcc_exchange_rules')->nullable();
            $table->text('hitcc_exchange_facilities')->nullable();
            $table->text('hitcc_exchange_accomodation')->nullable();
            $table->text('hitcc_exchange_detail_information')->nullable();

            $table->timestamps();

            $table->index('hitcc_programme_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_exchanges');
    }
};
