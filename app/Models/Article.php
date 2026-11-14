<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'img',
        'author',
        'editor',
        'date',
        'slug',
        'category',
    ];

    protected static function booted()
    {
        static::deleting(function ($article) {
            if ($article->img) {
                Storage::delete($article->img);
            }
        });
    }
}
