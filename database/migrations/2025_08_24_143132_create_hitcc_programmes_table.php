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
        Schema::create('hitcc_programmes', function (Blueprint $table) {
            $table->id();
            // relasi kategori (fix untuk filter & SEO)
            $table->foreignId('hitcc_category_id')
                ->constrained('hitcc_categories')
                ->cascadeOnDelete();

            // slug untuk URL detail
            $table->string('slug')->unique();

            // untuk sort
            $table->integer('sort_order')->default(0);

            // ===== Field Umum (sesuai rencana kamu) =====
            $table->string('title_program');
            $table->string('company_name');

            $table->string('logo_company_img')->nullable(); // path/URL logo
            $table->string('bg_poster_img')->nullable();    // path/URL poster/banner
            $table->string('link_apply')->nullable();

            $table->text('registration_info')->nullable();
            $table->date('registration_deadline')->nullable();

            $table->longText('company_desc')->nullable();
            $table->string('company_number')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_social_media')->nullable();

            $table->timestamps();

            $table->index('hitcc_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hitcc_programmes');
    }
};
