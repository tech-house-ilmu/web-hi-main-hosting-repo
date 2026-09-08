<?php

namespace App\Providers;

use App\Models\Comment;
use App\Services\SimpleCaptcha;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('partials.comments', function ($view) {
            $pageSlug = url()->current();
            $comments = Comment::where('page_slug', $pageSlug)
                ->whereNull('parent_id')
                ->with('replies')
                ->latest()
                ->take(10)
                ->get();
            SimpleCaptcha::generate();
            $view->with(compact('comments', 'pageSlug'));
        });
    }
}
