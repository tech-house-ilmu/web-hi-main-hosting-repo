<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniAlumniCareer extends Model
{
    use HasFactory;

    protected $table = 'testimoni_alumni_career';

    protected $fillable = [
        'testimoni_alumni_img',
        'testimoni_alumni_name',
        'testimoni_alumni_position',
        'testimoni_alumni_description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
