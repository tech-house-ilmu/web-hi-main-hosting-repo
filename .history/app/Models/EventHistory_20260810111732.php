<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHistory extends Model
{
    protected $fillable = [
        'nama_event',
        'deskripsi',
        'slug',
        'tanggal_event',
        'img',
        'category'
    ];
}
