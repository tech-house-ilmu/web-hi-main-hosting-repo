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
        Schema::create('leaders_details_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('leaders_details_img')->nullable();
            $table->string('leaders_details_name')->nullable();
            $table->enum('leaders_details_position', [
                'CEO',
                'COO',
                'CTO',
                'CFO',
                'CMO',
                'VP',
                'Head Of',
            ]);
            $table->string('leaders_details_position_division')->nullable();
            $table->string('leaders_details_linkedin')->nullable();
            $table->string('leaders_details_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaders_details_abouts');
    }
};
