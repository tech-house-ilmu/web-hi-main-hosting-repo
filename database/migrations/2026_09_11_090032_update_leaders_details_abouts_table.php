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
        Schema::table('leaders_details_abouts', function (Blueprint $table) {
            $table->string('leaders_details_position')->change();
            $table->string('leaders_details_sub_division')->nullable()->after('leaders_details_position_division');
            $table->integer('order')->default(0)->after('leaders_details_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaders_details_abouts', function (Blueprint $table) {
            $table->dropColumn(['leaders_details_sub_division', 'order']);
        });
    }
};
