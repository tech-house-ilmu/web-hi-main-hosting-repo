<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        // Otomatis ubah kolom JSON 'images' menjadi array PHP & sebaliknya
        'images' => 'array',
    ];
}
