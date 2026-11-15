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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable()->after('is_admin');
            $table->string('division')->nullable()->after('role');
            $table->string('subrole')->nullable()->after('division');
            $table->boolean('is_active')->default(true)->after('subrole');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'division', 'subrole', 'is_active']);
        });
    }
};
