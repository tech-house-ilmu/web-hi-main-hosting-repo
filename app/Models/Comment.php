<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['page_slug', 'name', 'content', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    protected static function booted()
    {
        static::saved(function ($comment) {
            \Illuminate\Support\Facades\Cache::forget("comments_{$comment->page_slug}");
            \Illuminate\Support\Facades\Cache::forget("comments_index_{$comment->page_slug}");
        });

        static::deleted(function ($comment) {
            \Illuminate\Support\Facades\Cache::forget("comments_{$comment->page_slug}");
            \Illuminate\Support\Facades\Cache::forget("comments_index_{$comment->page_slug}");
        });
    }
}
