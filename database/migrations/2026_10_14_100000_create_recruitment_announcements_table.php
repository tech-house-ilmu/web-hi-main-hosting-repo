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
        Schema::create('recruitment_announcements', function (Blueprint $table) {
            $table->id();

            // Status: 'dibuka', 'stay_tuned', 'selesai'
            $table->string('status')->default('selesai');
            $table->string('batch_label')->default('Batch 6 Urgent Hiring – Official Announcement');
            $table->string('announcement_date')->nullable()->default('Tanggal pengumuman belum tersedia');

            // Copywriting saat status: 'dibuka'
            $table->string('open_badge')->default('PENDAFTARAN DIBUKA');
            $table->string('open_title')->default('Pendaftaran Relawan Batch 6 Telah Dibuka!');
            $table->text('open_description')->nullable();
            $table->string('open_button_text')->default('Jelajahi Lowongan');
            $table->string('open_button_url')->default('#career-info');

            // Copywriting saat status: 'stay_tuned'
            $table->string('stay_tuned_badge')->default('STAY TUNED');
            $table->string('stay_tuned_title')->default('Proses Seleksi Sedang Berlangsung');
            $table->text('stay_tuned_description')->nullable();
            $table->string('stay_tuned_button_text')->nullable()->default('Pantau Instagram');
            $table->string('stay_tuned_button_url')->nullable()->default('https://www.instagram.com/houseilmu.id');

            // Copywriting saat status: 'selesai'
            $table->string('closed_badge')->default('REKRUTMEN SELESAI');
            $table->string('closed_title')->default('Pengumuman Hasil Seleksi Rekrutmen');
            $table->text('closed_description')->nullable();
            $table->string('closed_button_text')->default('Lihat Pengumuman');
            $table->string('closed_button_url')->default('/career/announcement');

            // Detail Page Heading & Closing
            $table->string('page_heading')->default('Selamat kepada Kawaners yang telah lolos!');
            $table->text('page_subheading')->nullable();
            $table->string('closing_title')->default('Terima kasih sudah berproses bersama kami');
            $table->text('closing_description')->nullable();

            // Divisions & Passed Names (JSON)
            $table->json('divisions')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_announcements');
    }
};

