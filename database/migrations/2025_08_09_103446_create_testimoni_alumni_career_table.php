<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimoni_alumni_career', function (Blueprint $table) {
            $table->id();
            $table->string('testimoni_alumni_img', 255)->nullable();
            $table->string('testimoni_alumni_name', 100);
            $table->string('testimoni_alumni_position', 100);
            $table->string('testimoni_alumni_description', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimoni_alumni_career');
    }
};
