<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = [
        'testimoni_img',
        'testimoni_name',
        'testimoni_position',
        'testimoni_description',
    ];
}
